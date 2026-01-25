<?php

namespace Database\Seeders;

use App\Models\CmsLink;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $links = [
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 1,
                'name' => 'Facebook',
                'link' => '#',
                'icon' => 'fa-brands fa-facebook-f',
                'target' => '_self',
                'type' => 'social-link',
            ],
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 1,
                'name' => 'Twitter',
                'link' => '#',
                'icon' => 'fa-brands fa-twitter',
                'target' => '_self',
                'type' => 'social-link',
            ],
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 1,
                'name' => 'Linkedin',
                'link' => '#',
                'icon' => 'fa-brands fa-linkedin',
                'target' => '_self',
                'type' => 'social-link',
            ],
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 1,
                'name' => 'Youtube',
                'link' => '#',
                'icon' => 'fa-brands fa-youtube',
                'target' => '_self',
                'type' => 'social-link',
            ],

            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 1,
                'name' => 'info@quantum-technical.com',
                'link' => '#',
                'icon' => 'fa-duotone fa-envelope',
                'target' => '_self',
                'type' => 'contact-info-link',
            ],

            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 1,
                'name' => '+0580161257',
                'link' => '#',
                'icon' => 'fa-duotone fa-phone',
                'target' => '_self',
                'type' => 'contact-info-link',
            ],

            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'Facebook',
                'link' => '#',
                'icon' => 'fa-brands fa-facebook-f',
                'target' => '_self',
                'type' => 'social-link',
            ],
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'Twitter',
                'link' => '#',
                'icon' => 'fa-brands fa-twitter',
                'target' => '_self',
                'type' => 'social-link',
            ],
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'Linkedin',
                'link' => '#',
                'icon' => 'fa-brands fa-linkedin',
                'target' => '_self',
                'type' => 'social-link',
            ],
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'Youtube',
                'link' => '#',
                'icon' => 'fa-brands fa-youtube',
                'target' => '_self',
                'type' => 'social-link',
            ],

            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'About Quantum Solutions',
                'link' => '#',
                'route_name' => 'frontend.about.index',
                'icon' => 'fa-regular fa-angles-right',
                'target' => '_blank',
                'type' => 'quick-link',
            ],

            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'IT Services',
                'link' => '#',
                'route_name' => 'frontend.services.index',
                'icon' => 'fa-regular fa-angles-right',
                'target' => '_blank',
                'type' => 'quick-link',
            ],

            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'IT Solutions',
                'link' => '#',
                'route_name' => 'frontend.service-solutions.index',
                'icon' => 'fa-regular fa-angles-right',
                'target' => '_blank',
                'type' => 'quick-link',
            ],
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'FAQ',
                'link' => '#',
                'route_name' => 'frontend.faq.index',
                'icon' => 'fa-regular fa-angles-right',
                'target' => '_blank',
                'type' => 'quick-link',
            ],

            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'Contact Us',
                'link' => '#',
                'route_name' => 'frontend.contact.index',
                'icon' => 'fa-regular fa-angles-right',
                'target' => '_blank',
                'type' => 'quick-link',
            ],

            // terms and conditions
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'Terms and Conditions',
                'link' => '#',
                'route_name' => 'frontend.terms-and-conditions.index',
                'icon' => 'fa-regular fa-angles-right',
                'target' => '_blank',
                'type' => 'bottom-footer-link',
            ],

            // privacy policy
            [
                'linkable_type' => 'App\Models\CmsSection',
                'linkable_id' => 3,
                'name' => 'Privacy Policy',
                'link' => '#',
                'route_name' => 'frontend.privacy-policy.index',
                'icon' => 'fa-regular fa-angles-right',
                'target' => '_blank',
                'type' => 'bottom-footer-link',
            ],
        ];
        foreach ($links as $link) {
            CmsLink::create($link);
        }
    }
}
