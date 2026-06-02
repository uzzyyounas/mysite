<?php

namespace App\Traits;

trait Seoable
{
    protected function setSeo($data)
    {
        view()->share('seo', [
            'title' => $data['title'] ?? 'Muhammad Usman Younas - Software Engineer',
            'description' => $data['description'] ?? 'Professional Software Engineer specializing in Oracle ERP, Laravel Development, and Full Stack Web Development',
            'keywords' => $data['keywords'] ?? 'Software Engineer, Oracle ERP, Laravel, PHP, Full Stack Developer',
            'og_image' => $data['og_image'] ?? asset('images/og-image.jpg'),
            'canonical' => $data['canonical'] ?? url()->current(),
        ]);
    }
}
