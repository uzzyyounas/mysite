<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SoftwareHouseController extends Controller
{
    private array $companyData;

    public function __construct()
    {
        $this->companyData = $this->getCompanyData();
    }

    /* ─────────────────────────────── Pages ─── */

    public function index()
    {
        $data = $this->companyData;
        $featuredServices = array_slice($data['services'], 0, 6);
        $featuredProjects = array_filter($data['projects'], fn($p) => $p['featured'] ?? false);
        return view('pages.home', compact('data', 'featuredServices', 'featuredProjects'));
    }

    public function about()
    {
        return view('pages.about', ['data' => $this->companyData]);
    }

    public function services()
    {
        $data = $this->companyData;

        return view('pages.services', ['data' => $data, 'services' => $data['services']]);
    }

    public function serviceDetail(string $slug)
    {
        $data = $this->companyData;
        $service = collect($data['services'])->firstWhere('slug', $slug);

        if (!$service) {
            abort(404);
        }

        $related = collect($data['services'])
            ->where('slug', '!=', $slug)
            ->take(3)
            ->values()
            ->all();

        return view('pages.service-detail', compact('data', 'service', 'related'));
    }

    public function projects()
    {
        $data = $this->companyData;
        return view('pages.projects', ['data' => $data, 'projects' => $data['projects']]);
    }

    public function projectDetail(string $slug)
    {
        $data = $this->companyData;
        $project = collect($data['projects'])->firstWhere('slug', $slug);

        if (!$project) {
            abort(404);
        }

        $related = collect($data['projects'])
            ->where('slug', '!=', $slug)
            ->take(3)
            ->values()
            ->all();

        return view('pages.project-detail', compact('data', 'project', 'related'));
    }

    public function team()
    {
        return view('pages.team', ['data' => $this->companyData]);
    }

    public function contactPage()
    {
        return view('pages.contact', ['data' => $this->companyData]);
    }

    /* ─────────────────────────── Contact Form ─── */

    public function submitContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'company' => 'nullable|string|max:150',
            'service' => 'nullable|string|max:100',
            'budget'  => 'nullable|string|max:50',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:3000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        try {
            $toEmail = env('MAIL_TO_ADDRESS', 'uzzy.younas@gmail.com');

            Mail::send('emails.contact', [
                'senderName'    => $request->name,
                'senderEmail'   => $request->email,
                'company'       => $request->company,
                'service'       => $request->service,
                'budget'        => $request->budget,
                'subject'       => $request->subject,
                'messageBody'   => $request->message,
            ], function ($mail) use ($toEmail, $request) {
                $mail->to($toEmail)
                    ->replyTo($request->email, $request->name)
                    ->subject('New Project Enquiry: ' . $request->subject);
            });

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your enquiry has been received. We will get back to you within 24 hours.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Message failed to send. Please reach out via WhatsApp for immediate assistance.',
            ], 500);
        }
    }

    /* ──────────────────────────── Company Data ─── */

    private function getCompanyData(): array
    {
        return [
            /* ── Brand ── */
            'company'     => 'UzySolution',
            'tagline'     => 'Engineering Digital Excellence',
            'description' => 'We build enterprise-grade software, ERP systems, and modern web applications that drive business growth. From Oracle ERP to Laravel platforms — we deliver solutions that last.',
            'founded'     => '2025',
            'email'       => 'uzzy.younas@gmail.com',
            'phone'       => '0306-1745031',
            'location'    => 'Faisalabad, Pakistan',
            'linkedin'    => 'https://www.linkedin.com/in/usman-younas-2874b7223/',
            'whatsapp'    => env('WHATSAPP_NUMBER', '923061745031'),

            /* ── Stats ── */
            'stats' => [
                ['value' => '5+', 'label' => 'Projects Delivered'],
                ['value' => '4+',  'label' => 'Years Experience'],
                ['value' => '2+', 'label' => 'Happy Clients'],
                ['value' => '99%', 'label' => 'Client Satisfaction'],
            ],

            /* ── Team ── */
            'team' => [
                [
                    'name'       => 'Muhammad Usman Younas',
                    'role'       => 'CEO & Software Developer',
                    'bio'        => 'Results-driven Software Engineer with 4+ years in Oracle ERP, Laravel, and enterprise application development. Oracle APEX Cloud Developer Certified Professional.',
                    'email'      => 'uzzy.younas@gmail.com',
                    'linkedin'   => 'https://www.linkedin.com/in/usman-younas-2874b7223/',
                    'skills'     => ['Oracle Database', 'Oracle ERP', 'Oracle Apex', 'Laravel', 'PL/SQL', 'PHP 8.x', 'System Architecture'],
                    'avatar'     => null,
                    'certifications' => ['Oracle APEX Cloud Developer Certified Professional', 'Cybersecurity Essentials – CISCO'],
                ],
            ],

            /* ── Services ── */
            'services' => [
                [
                    'slug'        => 'oracle-erp-development',
                    'title'       => 'Oracle ERP Development',
                    'short'       => 'Custom Oracle Forms, APEX, and Reports for enterprise operations.',
                    'icon'        => 'database',
                    'color'       => '#00d4ff',
                    'description' => 'We design, develop, and maintain comprehensive Oracle ERP systems tailored to your business processes. From financial accounting to inventory management, our Oracle-certified team delivers end-to-end enterprise solutions.',
                    'features'    => [
                        'Oracle Forms 6i / 10g development',
                        'Oracle APEX application development',
                        'PL/SQL stored procedures & triggers',
                        'Oracle Reports (financial, operational)',
                        'ERP module integration & customisation',
                        'Database design & query optimisation',
                        'Executive dashboards & analytics',
                        'Excel data upload & automation',
                    ],
                    'technologies' => ['Oracle Forms', 'Oracle APEX', 'PL/SQL', 'Oracle DB 11g/12c/19c', 'Oracle Reports', 'JavaScript'],
                    'use_cases'   => ['Universities & Institutions', 'Manufacturing & Textile', 'Financial Services', 'Healthcare Systems'],
                    'process'     => [
                        ['step' => '01', 'title' => 'Requirement Analysis', 'desc' => 'Deep-dive into your current ERP workflows and identify gaps.'],
                        ['step' => '02', 'title' => 'System Design', 'desc' => 'Design database schema, module architecture, and integration points.'],
                        ['step' => '03', 'title' => 'Development & Testing', 'desc' => 'Agile sprint development with continuous unit testing.'],
                        ['step' => '04', 'title' => 'Deployment & Training', 'desc' => 'Production deployment with staff training and documentation.'],
                    ],
                    'faq' => [
                        ['q' => 'Which Oracle versions do you support?', 'a' => 'We work with Oracle Forms 6i & 10g, Oracle DB 11g, 12c, and 19c, and Oracle APEX latest versions.'],
                        ['q' => 'Can you migrate from Oracle Forms to APEX?', 'a' => 'Yes, we offer full migration services from Oracle Forms to modern APEX applications with feature parity.'],
                    ],
                ],
                [
                    'slug'        => 'laravel-web-development',
                    'title'       => 'Laravel Web Development',
                    'short'       => 'Scalable PHP Laravel applications, APIs, and management systems.',
                    'icon'        => 'code',
                    'color'       => '#ff2d20',
                    'description' => 'We build robust, scalable web applications using Laravel — PHP\'s most powerful framework. From simple management tools to complex enterprise platforms with APIs, our Laravel applications are clean, secure, and built to scale.',
                    'features'    => [
                        'Custom Laravel application development',
                        'RESTful API design & development',
                        'Multi-role authentication systems',
                        'Admin panels & dashboards',
                        'Database design with Eloquent ORM',
                        'Payment gateway integration',
                        'PDF generation & reporting',
                        'Email automation & notifications',
                    ],
                    'technologies' => ['Laravel 10/11', 'PHP 8.x', 'MySQL', 'Bootstrap 5', 'JavaScript', 'RESTful APIs'],
                    'use_cases'   => ['Enterprise Management Systems', 'Educational Portals', 'Inventory & Assets', 'Invoicing Platforms'],
                    'process'     => [
                        ['step' => '01', 'title' => 'Discovery', 'desc' => 'Understand your requirements, user stories, and technical constraints.'],
                        ['step' => '02', 'title' => 'Architecture', 'desc' => 'Design database schema, API contracts, and application structure.'],
                        ['step' => '03', 'title' => 'Development', 'desc' => 'Feature-by-feature build with regular demos and feedback loops.'],
                        ['step' => '04', 'title' => 'Launch & Support', 'desc' => 'Deploy to production with ongoing maintenance support.'],
                    ],
                    'faq' => [
                        ['q' => 'Do you provide source code?', 'a' => 'Absolutely. All code is fully documented and handed over to you upon project completion.'],
                        ['q' => 'Can you integrate with third-party services?', 'a' => 'Yes — payment gateways, SMS services, Google APIs, and any REST-based third-party service.'],
                    ],
                ],
                [
                    'slug'        => 'institutional-website-development',
                    'title'       => 'Institutional Websites',
                    'short'       => 'Professional websites for schools, universities, and organisations.',
                    'icon'        => 'globe',
                    'color'       => '#f77f00',
                    'description' => 'We design and develop professional, SEO-optimised websites for educational institutions, NGOs, and corporate organisations. Each site is crafted for performance, accessibility, and search engine visibility.',
                    'features'    => [
                        'Responsive mobile-first design',
                        'SEO-optimised structure & metadata',
                        'Dynamic CMS for content management',
                        'Multi-language support',
                        'Online enquiry & enrolment forms',
                        'Photo & video galleries',
                        'News & events management',
                        'Google Analytics integration',
                    ],
                    'technologies' => ['Laravel', 'HTML5', 'CSS3', 'JavaScript', 'MySQL', 'SEO Tools'],
                    'use_cases'   => ['Schools & Colleges', 'Universities', 'NGOs & Foundations', 'Corporate Portals'],
                    'process'     => [
                        ['step' => '01', 'title' => 'Design Mockup', 'desc' => 'UI/UX mockup aligned with your brand identity.'],
                        ['step' => '02', 'title' => 'Development', 'desc' => 'Full responsive development with CMS integration.'],
                        ['step' => '03', 'title' => 'SEO Setup', 'desc' => 'Metadata, sitemaps, robots.txt, and page speed optimisation.'],
                        ['step' => '04', 'title' => 'Go Live', 'desc' => 'Domain & hosting setup, SSL, and launch monitoring.'],
                    ],
                    'faq' => [
                        ['q' => 'Will the website be mobile-friendly?', 'a' => 'Yes, every site is built mobile-first and tested across all screen sizes and browsers.'],
                        ['q' => 'Do you handle hosting and domain setup?', 'a' => 'We assist with server configuration, domain pointing, SSL certificates, and initial deployment.'],
                    ],
                ],
                [
                    'slug'        => 'inventory-financial-systems',
                    'title'       => 'Inventory & Financial Systems',
                    'short'       => 'End-to-end inventory tracking, accounting, and financial reporting.',
                    'icon'        => 'layers',
                    'color'       => '#06d6a0',
                    'description' => 'Custom-built inventory management and financial accounting systems that replace spreadsheets and disconnected tools with a unified, accurate platform. Real-time stock tracking, supplier management, and automated financial reporting.',
                    'features'    => [
                        'Real-time inventory tracking',
                        'Purchase order & supplier management',
                        'Fixed asset management & depreciation',
                        'Chart of accounts & ledger',
                        'Accounts payable & receivable',
                        'Financial statement generation',
                        'Stock alerts & reorder points',
                        'Barcode & SKU integration',
                    ],
                    'technologies' => ['Oracle DB', 'Laravel', 'PL/SQL', 'MySQL', 'PHP', 'Bootstrap'],
                    'use_cases'   => ['Textile & Garments', 'Universities & Institutions', 'Retail & Distribution', 'Manufacturing'],
                    'process'     => [
                        ['step' => '01', 'title' => 'Process Mapping', 'desc' => 'Map your existing inventory and financial workflows in detail.'],
                        ['step' => '02', 'title' => 'System Design', 'desc' => 'Design data models, workflows, and reporting requirements.'],
                        ['step' => '03', 'title' => 'Build & Integrate', 'desc' => 'Develop with existing data migration from legacy systems.'],
                        ['step' => '04', 'title' => 'Go Live', 'desc' => 'Staff training, UAT, and phased production rollout.'],
                    ],
                    'faq' => [
                        ['q' => 'Can you migrate our data from Excel?', 'a' => 'Yes, we include data migration from Excel, Access, or existing ERP systems as part of the project scope.'],
                        ['q' => 'Does the system generate accounting reports?', 'a' => 'Yes — balance sheets, profit & loss, trial balance, and custom executive reports are all included.'],
                    ],
                ],
                [
                    'slug'        => 'hrms-payroll-systems',
                    'title'       => 'HRMS & Payroll Systems',
                    'short'       => 'Human resource management, attendance, and payroll automation.',
                    'icon'        => 'users',
                    'color'       => '#7209b7',
                    'description' => 'Streamline HR operations with a comprehensive Human Resource Management System covering employee lifecycle, attendance, leave management, and fully automated payroll processing.',
                    'features'    => [
                        'Employee onboarding & profiles',
                        'Attendance & time tracking',
                        'Leave management & approval workflows',
                        'Automated payroll calculation',
                        'Salary slips & payroll reports',
                        'Tax deduction management',
                        'Performance review tracking',
                        'HR analytics & dashboards',
                    ],
                    'technologies' => ['Oracle Forms', 'Oracle DB', 'Laravel', 'PHP', 'PL/SQL', 'MySQL'],
                    'use_cases'   => ['Textile & Garments Industry', 'Educational Institutions', 'Corporate Companies', 'Manufacturing Plants'],
                    'process'     => [
                        ['step' => '01', 'title' => 'HR Audit', 'desc' => 'Review existing HR processes, policies, and data structures.'],
                        ['step' => '02', 'title' => 'Module Design', 'desc' => 'Configure modules to match your organisational hierarchy.'],
                        ['step' => '03', 'title' => 'Development', 'desc' => 'Build with payroll engine, approval workflows, and reporting.'],
                        ['step' => '04', 'title' => 'Rollout', 'desc' => 'Phased implementation with parallel run for payroll validation.'],
                    ],
                    'faq' => [
                        ['q' => 'Can the payroll handle complex salary structures?', 'a' => 'Yes — basic salary, allowances, deductions, overtime, bonuses, and tax calculations are all configurable.'],
                        ['q' => 'Does it integrate with attendance hardware?', 'a' => 'We can integrate with biometric and card-based attendance systems.'],
                    ],
                ],
                [
                    'slug'        => 'server-devops-services',
                    'title'       => 'Server & DevOps Services',
                    'short'       => 'Server setup, administration, security hardening, and deployment.',
                    'icon'        => 'settings',
                    'color'       => '#ef233c',
                    'description' => 'Reliable server administration and DevOps services to keep your applications running at peak performance. We handle everything from initial server provisioning to ongoing monitoring and security hardening.',
                    'features'    => [
                        'Linux server provisioning & configuration',
                        'Oracle DB server administration',
                        'SSL certificates & security hardening',
                        'Network performance monitoring',
                        'Automated backup strategies',
                        'Application deployment & CI pipelines',
                        'User access management',
                        'Third-party software integration',
                    ],
                    'technologies' => ['Linux (Ubuntu/CentOS)', 'Apache/Nginx', 'Oracle DB Admin', 'MySQL', 'SSL/TLS', 'Bash Scripting'],
                    'use_cases'   => ['ERP Server Management', 'Web Application Hosting', 'Database Administration', 'Network Security'],
                    'process'     => [
                        ['step' => '01', 'title' => 'Infrastructure Audit', 'desc' => 'Assess current server setup, security posture, and performance.'],
                        ['step' => '02', 'title' => 'Hardening Plan', 'desc' => 'Design security policies, backup schedules, and monitoring setup.'],
                        ['step' => '03', 'title' => 'Implementation', 'desc' => 'Apply configurations with zero-downtime migration strategies.'],
                        ['step' => '04', 'title' => 'Ongoing Support', 'desc' => 'Monthly health reports and proactive incident response.'],
                    ],
                    'faq' => [
                        ['q' => 'Do you offer ongoing server management?', 'a' => 'Yes, we offer monthly retainer packages for server monitoring, updates, and support.'],
                        ['q' => 'Can you migrate our app to a new server?', 'a' => 'Absolutely — we handle full server migration with data integrity checks and rollback plans.'],
                    ],
                ],
            ],

            /* ── Projects ── */
            'projects' => [
                [
                    'slug'        => 'fixed-asset-management-system',
                    'title'       => 'Fixed Asset Management System',
                    'client'      => 'The University of Faisalabad',
                    'category'    => 'Enterprise Application',
                    'tech'        => ['Laravel', 'PHP 8', 'MySQL', 'Bootstrap 5'],
                    'color'       => '#00b4d8',
                    'icon'        => 'box',
                    'featured'    => true,
                    'description' => 'A comprehensive enterprise-grade Fixed Asset Management System implemented at The University of Faisalabad, managing thousands of assets across multiple departments.',
                    'challenge'   => 'The university had no centralised system for tracking physical assets — equipment, furniture, and IT hardware were tracked in disconnected spreadsheets, making depreciation calculations and audits extremely difficult.',
                    'solution'    => 'We built a fully-featured Laravel application with asset lifecycle management, automated depreciation using multiple methods (straight-line, declining balance), location-based tracking, and executive reporting.',
                    'results'     => ['100% asset visibility across all departments', 'Automated depreciation reports saved 20+ hours/month', 'Audit-ready asset register at all times', 'Integrated with existing university ERP'],
                    'features'    => ['Asset registration & categorisation', 'Depreciation engine (multiple methods)', 'Asset assignment & transfer', 'Disposal & write-off management', 'QR code asset tagging', 'Excel import/export'],
                    'duration'    => '3 months',
                    'year'        => '2024',
                ],
                [
                    'slug'        => 'digital-invoicing-system',
                    'title'       => 'Digital Invoicing Platform',
                    'client'      => 'Private Client',
                    'category'    => 'Full Application',
                    'tech'        => ['Laravel', 'PHP 8', 'MySQL', 'JavaScript', 'mPDF'],
                    'color'       => '#06d6a0',
                    'icon'        => 'file-text',
                    'featured'    => true,
                    'description' => 'A full-featured digital invoicing solution with client management, recurring invoices, payment tracking, and automated PDF generation.',
                    'challenge'   => 'The client was manually creating invoices in Word, losing track of payments, and had no visibility into which clients owed money or the overall revenue picture.',
                    'solution'    => 'We developed a Laravel-based invoicing platform with multi-currency support, automated email delivery, payment reminders, and a financial dashboard showing revenue analytics.',
                    'results'     => ['Invoice creation time reduced by 85%', 'Zero missed payment follow-ups', 'Real-time revenue visibility', 'Professional PDF invoices with branding'],
                    'features'    => ['Client & product management', 'Invoice & quote generation', 'PDF export with custom branding', 'Payment status tracking', 'Automated email reminders', 'Revenue dashboard'],
                    'duration'    => '6 weeks',
                    'year'        => '2023',
                ],
                [
                    'slug'        => 'igss-institutional-website',
                    'title'       => 'IGSS School System Website',
                    'client'      => 'IGSS School System',
                    'category'    => 'Web Development',
                    'tech'        => ['Laravel', 'PHP', 'MySQL', 'HTML5', 'CSS3', 'JavaScript'],
                    'color'       => '#f77f00',
                    'icon'        => 'globe',
                    'featured'    => true,
                    'url'         => 'https://igss.edu.pk/',
                    'description' => 'A fully functional institutional website for IGSS School System, designed from scratch with a modern responsive layout and dynamic content management.',
                    'challenge'   => 'IGSS had no online presence, making it difficult for prospective parents to discover the school, access information, or submit enquiries.',
                    'solution'    => 'We designed and developed a mobile-first website with an admin panel for content management, online enquiry forms, and complete SEO optimisation to improve organic search visibility.',
                    'results'     => ['First page Google ranking for local school searches', 'Online enquiries increased from 0 to 40+/month', 'Staff can update content without developer help', 'PageSpeed score of 92/100'],
                    'features'    => ['CMS for news, events, and galleries', 'Online admission enquiry form', 'Responsive across all devices', 'SEO-optimised pages', 'Staff & faculty directory', 'Academic calendar'],
                    'duration'    => '5 weeks',
                    'year'        => '2023',
                ],
                [
                    'slug'        => 'aliz-educational-website',
                    'title'       => 'ALIZ Educational Platform',
                    'client'      => 'ALIZ Educational Institute',
                    'category'    => 'Web Development',
                    'tech'        => ['Laravel', 'PHP', 'MySQL', 'HTML5', 'CSS3', 'JavaScript'],
                    'color'       => '#7209b7',
                    'icon'        => 'globe',
                    'featured'    => false,
                    'url'         => 'https://aliz.edu.pk/',
                    'description' => 'A dynamic educational institution website with online enrolment, course listings, and a full content management system.',
                    'challenge'   => 'Managing student enquiries via phone was inefficient. The institute needed a digital presence that could handle online enrolment and showcase their courses effectively.',
                    'solution'    => 'We built a feature-rich Laravel website with online enrolment forms, dynamic course management, a media gallery, and an events calendar — all manageable by staff.',
                    'results'     => ['Online enrolment requests up 60%', 'Reduced admin phone calls significantly', 'Strong organic search presence', 'Mobile traffic accounts for 70% of visitors'],
                    'features'    => ['Online enrolment forms', 'Dynamic course catalogue', 'Photo & video gallery', 'Events & announcements', 'SEO-optimised structure', 'Admin content panel'],
                    'duration'    => '4 weeks',
                    'year'        => '2024',
                ],
                [
                    'slug'        => 'oracle-apex-erp-dashboards',
                    'title'       => 'Oracle APEX ERP Dashboards',
                    'client'      => 'The University of Faisalabad',
                    'category'    => 'ERP / Dashboard',
                    'tech'        => ['Oracle APEX', 'PL/SQL', 'Oracle DB 19c', 'JavaScript', 'REST APIs'],
                    'color'       => '#ef233c',
                    'icon'        => 'bar-chart-2',
                    'featured'    => true,
                    'description' => 'Executive decision-making dashboards built on Oracle APEX, providing real-time visibility into university ERP data including inventory, finance, and HR metrics.',
                    'challenge'   => 'University leadership had no real-time visibility into operational metrics. Reports were generated manually from Oracle Forms, taking days and often containing errors.',
                    'solution'    => 'We developed a suite of interactive APEX dashboards with drill-down capabilities, automated report scheduling, Excel upload for bulk data entry, and role-based access for different management levels.',
                    'results'     => ['Executive reports generated in seconds vs days', 'Data entry errors reduced by 70%', 'Real-time inventory & financial visibility', 'Multi-department access with secure roles'],
                    'features'    => ['Interactive charts & KPI cards', 'Drill-down data exploration', 'Excel bulk data upload', 'Scheduled automated reports', 'Role-based access control', 'Mobile-responsive APEX UI'],
                    'duration'    => 'Ongoing',
                    'year'        => '2023–Present',
                ],
                [
                    'slug'        => 'garments-production-line-system',
                    'title'       => 'Garments Production Line System',
                    'client'      => 'Fashion & Trends Pvt. Ltd.',
                    'category'    => 'ERP System',
                    'tech'        => ['Oracle Forms 6i', 'Oracle DB 11g', 'PL/SQL', 'Oracle Reports'],
                    'color'       => '#4cc9f0',
                    'icon'        => 'cpu',
                    'featured'    => false,
                    'description' => 'End-to-end Garments Production Line Management System covering Cut to Pack workflows, HRMS, and inventory tracking for a 500+ employee garments manufacturer.',
                    'challenge'   => 'The company was managing a 500+ worker production line entirely on paper. Order status, efficiency metrics, and material consumption were unknown until end-of-week manual counts.',
                    'solution'    => 'We implemented a full Oracle Forms 6i ERP system covering order management, cutting room operations, sewing line tracking, finishing, packing, and dispatch — with integrated HRMS for attendance and payroll.',
                    'results'     => ['Real-time production line visibility', 'Payroll processing time reduced by 60%', 'Material wastage tracked and reduced by 15%', 'Management reports available daily'],
                    'features'    => ['Cut to Pack workflow management', 'Daily production targets vs actuals', 'Material consumption tracking', 'Integrated HRMS & payroll', 'Supplier & purchase management', 'Custom Oracle Reports'],
                    'duration'    => '8 months',
                    'year'        => '2022',
                ],
            ],

            /* ── Why Us ── */
            'why_us' => [
                ['icon' => 'award',     'title' => 'Oracle Certified',     'desc' => 'Oracle APEX Cloud Developer Certified Professional with deep Oracle ecosystem expertise.'],
                ['icon' => 'zap',       'title' => 'Fast Delivery',         'desc' => 'Agile development process ensuring timely delivery without compromising on quality.'],
                ['icon' => 'shield',    'title' => 'Secure & Reliable',     'desc' => 'Security-first approach with CISCO Cybersecurity Essentials training.'],
                ['icon' => 'headphones','title' => '24/7 Support',           'desc' => 'Post-launch support and maintenance to keep your systems running smoothly.'],
                ['icon' => 'trending-up','title' => 'Scalable Solutions',   'desc' => 'Architecture designed to grow with your business — from startup to enterprise scale.'],
                ['icon' => 'code-2',    'title' => 'Clean Code',             'desc' => 'Well-documented, maintainable code following industry best practices.'],
            ],
        ];
    }
}
