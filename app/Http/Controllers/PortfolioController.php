<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    private $portfolioData;

    public function __construct()
    {
        $this->portfolioData = $this->getPortfolioData();
    }

    /**
     * Show home page
     */
    public function index()
    {
        return view('pages.home', ['data' => $this->portfolioData]);
    }

    /**
     * Show about page
     */
    public function about()
    {
        return view('pages.about', ['data' => $this->portfolioData]);
    }

    /**
     * Show skills page
     */
    public function skills()
    {
        return view('pages.skills', ['data' => $this->portfolioData]);
    }

    /**
     * Show experience page
     */
    public function experience()
    {
        return view('pages.experience', ['data' => $this->portfolioData]);
    }

    /**
     * Show projects page
     */
    public function projects()
    {
        return view('pages.projects', ['data' => $this->portfolioData]);
    }

    /**
     * Show contact page
     */
    public function contactPage()
    {
        return view('pages.contact', ['data' => $this->portfolioData]);
    }

    /**
     * Handle contact form submission.
     */
    public function submitContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
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
                'subject'       => $request->subject,
                'messageBody'   => $request->message,
            ], function ($mail) use ($toEmail, $request) {
                $mail->to($toEmail)
                    ->replyTo($request->email, $request->name)
                    ->subject('Portfolio Contact: ' . $request->subject);
            });

            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully! I will get back to you soon.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message. Please try again or contact me directly via WhatsApp.',
            ], 500);
        }
    }

    /**
     * Download CV / Resume.
     */
    public function downloadCV()
    {
        $filePath = public_path('cv/Usman_Younas_CV.pdf');

        if (file_exists($filePath)) {
            return response()->download($filePath, 'Muhammad_Usman_Younas_CV.pdf', [
                'Content-Type' => 'application/pdf',
            ]);
        }

        return redirect()->back()->with('error', 'CV file not found. Please contact me directly.');
    }

    /**
     * Portfolio data — edit this to update your profile.
     */
    private function getPortfolioData(): array
    {
        return [
            'name'     => 'Muhammad Usman Younas',
            'title'    => 'Software Engineer',
            'subtitle' => 'Oracle ERP & Full Stack Developer',
            'email'    => 'uzzy.younas@gmail.com',
            'phone'    => '0306-1745031',
            'location' => 'Faisalabad, Pakistan',
            'linkedin' => 'https://www.linkedin.com/in/usman-younas-2874b7223/',
            'whatsapp' => env('WHATSAPP_NUMBER', '923061745031'),
            'summary'  => 'Results-driven Software Engineer with 4+ years of experience in designing, developing, and maintaining ERP systems. Specialized in Oracle technologies (Oracle Forms, Reports, APEX, and Databases 11g/12c/19c) along with modern web development using PHP and Laravel. Proven expertise in Inventory Management, Financial Systems, HRMS, and custom enterprise applications.',

            'skills' => [
                [
                    'category' => 'Oracle Technologies',
                    'icon'     => 'database',
                    'items'    => ['Oracle Forms (6i, 10g)', 'Oracle Reports', 'Oracle APEX', 'Oracle DB 11g/12c/19c', 'PL/SQL', 'Database Design & Optimization'],
                ],
                [
                    'category' => 'Web Development',
                    'icon'     => 'code',
                    'items'    => ['PHP 8.x', 'Laravel Framework', 'HTML5 & CSS3', 'JavaScript', 'API Integration', 'RESTful APIs'],
                ],
                [
                    'category' => 'ERP Systems',
                    'icon'     => 'layers',
                    'items'    => ['Inventory Management', 'Financial Accounting', 'HRMS', 'Production Systems', 'Order Management', 'Cut to Pack Systems'],
                ],
                [
                    'category' => 'Tools & DevOps',
                    'icon'     => 'settings',
                    'items'    => ['Server Administration', 'Network Security', 'User Management', 'Third-party App Integration', 'Report Generation', 'Data Analysis'],
                ],
            ],

            'experience' => [
                [
                    'role'        => 'Software Engineer (Oracle ERP & Apex Developer)',
                    'company'     => 'The University of Faisalabad',
                    'location'    => 'Faisalabad, Pakistan',
                    'period'      => 'Sep 2023 – Present',
                    'current'     => true,
                    'highlights'  => [
                        'Managing and enhancing Inventory and Financial Accounting Systems within ERP',
                        'Developing custom ERP modules using Oracle Forms & APEX',
                        'Built APEX-based applications with authentication and Excel data upload',
                        'Designed executive dashboards and reporting systems',
                        'Developed database procedures for automation (file handling, image processing)',
                        'Designed and implemented Fixed Asset Management System using Laravel',
                        'Built and deployed multiple dynamic institutional websites',
                    ],
                ],
                [
                    'role'        => 'Software Developer',
                    'company'     => 'Uniform House & Home Textile',
                    'location'    => 'Jhang, Pakistan',
                    'period'      => 'Jul 2022 – Sep 2023',
                    'current'     => false,
                    'highlights'  => [
                        'Managed HRMS, Accounts, Production & Inventory Systems',
                        'Successfully implemented full ERP System',
                        'Developed Oracle 11g forms and reports for software management',
                        'Delivered quarterly reports to executive management',
                        'Installed and integrated new server hardware and applications',
                        'Monitored network performance and ensured security',
                    ],
                ],
                [
                    'role'        => 'Junior Software Developer',
                    'company'     => 'Fashion & Trends (Pvt.) Ltd.',
                    'location'    => 'Millat Industrial Estate, Faisalabad',
                    'period'      => 'Nov 2021 – Jul 2022',
                    'current'     => false,
                    'highlights'  => [
                        'Handled HRMS, Inventory, and Cut to Pack Line Management Systems',
                        'Designed Garments Production Line Management System in Oracle 6i',
                        'Developed Oracle 6i forms and reports for HRMS and Café management',
                        'Mapped Data Flow Diagrams (DFDs)',
                    ],
                ],
                [
                    'role'        => 'Computer Operator',
                    'company'     => 'AZ Apparel Pvt Limited',
                    'location'    => 'Faisalabad, Pakistan',
                    'period'      => 'Mar 2020 – Sep 2020',
                    'current'     => false,
                    'highlights'  => [
                        'Managed employee attendance records using computer systems',
                        'Maintained accuracy and confidentiality of employee information',
                        'Generated attendance and HR reports',
                    ],
                ],
            ],

            'projects' => [
                [
                    'title'       => 'Fixed Asset Management System',
                    'tech'        => ['Laravel', 'PHP', 'MySQL', 'Bootstrap'],
                    'category'    => 'Enterprise Application',
                    'description' => 'A comprehensive enterprise-grade Fixed Asset Management System built with Laravel, successfully implemented at The University of Faisalabad. Features asset tracking, depreciation calculation, and reporting.',
                    'icon'        => 'box',
                    'color'       => '#00b4d8',
                ],
                [
                    'title'       => 'Digital Invoicing System',
                    'tech'        => ['Laravel', 'PHP', 'MySQL', 'JavaScript'],
                    'category'    => 'Full Application',
                    'description' => 'A full-featured digital invoicing solution built with Laravel, including invoice generation, client management, payment tracking, and PDF export capabilities.',
                    'icon'        => 'file-text',
                    'color'       => '#06d6a0',
                ],
                [
                    'title'       => 'IGSS Institutional Website',
                    'tech'        => ['PHP', 'Laravel', 'HTML', 'CSS', 'JavaScript'],
                    'category'    => 'Web Development',
                    'description' => 'Designed and deployed a fully functional institutional website from scratch for IGSS School System.',
                    'url'         => 'https://igss.edu.pk/',
                    'icon'        => 'globe',
                    'color'       => '#f77f00',
                ],
                [
                    'title'       => 'ALIZ Educational Website',
                    'tech'        => ['PHP', 'Laravel', 'HTML', 'CSS', 'JavaScript'],
                    'category'    => 'Web Development',
                    'description' => 'Developed and deployed an educational institution website for ALIZ with dynamic content management, galleries, and online enrollment features.',
                    'url'         => 'https://aliz.edu.pk/',
                    'icon'        => 'globe',
                    'color'       => '#7209b7',
                ],
                [
                    'title'       => 'Oracle APEX ERP Dashboards',
                    'tech'        => ['Oracle APEX', 'PL/SQL', 'Oracle DB 19c', 'JavaScript'],
                    'category'    => 'ERP / Dashboard',
                    'description' => 'Executive decision-making dashboards and analytical reporting systems built on Oracle APEX for university ERP, featuring real-time data visualization and Excel data upload functionality.',
                    'icon'        => 'bar-chart-2',
                    'color'       => '#ef233c',
                ],
                [
                    'title'       => 'Garments Production Line System',
                    'tech'        => ['Oracle Forms 6i', 'Oracle DB 11g', 'PL/SQL'],
                    'category'    => 'ERP System',
                    'description' => 'End-to-end Garments Production Line Management System developed and implemented at Fashion & Trends Pvt. Ltd., covering Cut to Pack workflows, HRMS, and inventory tracking.',
                    'icon'        => 'cpu',
                    'color'       => '#4cc9f0',
                ],
            ],

            'education' => [
                [
                    'degree'      => 'BS Computer Science',
                    'institution' => 'Virtual University of Pakistan',
                    'period'      => 'Completed',
                ],
                [
                    'degree'      => 'F.S.C (Pre-Medical)',
                    'institution' => 'BISE Bahawalpur',
                    'period'      => '2020',
                ],
                [
                    'degree'      => 'Matriculation',
                    'institution' => 'BISE Bahawalpur, Bahawalnagar',
                    'period'      => '2018',
                ],
            ],

            'certifications' => [
                [
                    'name'   => 'Oracle APEX Cloud Developer Certified Professional',
                    'issuer' => 'Oracle',
                    'icon'   => 'award',
                ],
                [
                    'name'   => 'Cybersecurity Essentials',
                    'issuer' => 'CISCO',
                    'icon'   => 'shield',
                ],
                [
                    'name'   => 'Oracle Database & Forms Training (10g, Forms 6i)',
                    'issuer' => 'BST Computer Academy',
                    'icon'   => 'database',
                ],
            ],

            'languages' => ['English', 'Urdu', 'Punjabi'],
            'interests' => ['Information Technology & Science', 'Computer Networking', 'Sports', 'Traveling'],
        ];
    }
}
