<?php

namespace Database\Seeders;

use App\Models\CmsSection;
use App\Models\CmsSectionTranslation;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // general page sections
        // section 1 = top header
        CmsSection::create([
            'cms_page_id' => 1,
            'name' => 'Top Header',
            'type' => 'header',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 1,
            'is_active' => 1,
        ]);

        // section 2 = main header
        CmsSection::create([
            'cms_page_id' => 1,
            'name' => 'Main Header',
            'type' => 'header',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 1,
            'is_active' => 1,
        ]);

        // section 3 = footer
        CmsSection::create([
            'cms_page_id' => 1,
            'name' => 'Footer',
            'type' => 'footer',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 1,
            'is_active' => 1,
        ]);

        //home page sections
        // section 4 = hero
        CmsSection::create([
            'cms_page_id' => 2,
            'name' => 'Hero',
            'type' => 'hero',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 1,
            'is_active' => 1,
        ]);

        // section 5 = what we offer
        CmsSection::create([
            'cms_page_id' => 2,
            'name' => 'What We Offer',
            'type' => 'features',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 2,
            'is_active' => 1,
        ]);
        // what we offer section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 5,
            'locale' => 'en',
            'title' => 'Comprehensive IT Services for Modern Businesses',
            'subtitle' => 'What We Offer',
            'description' => '',
        ]);

        //  section 6 = about
        CmsSection::create([
            'cms_page_id' => 2,
            'name' => 'About',
            'type' => 'about',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 3,
            'is_active' => 1,
        ]);

        // about section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 6,
            'locale' => 'en',
            'title' => 'We Strive to Offer Intelligent Business Solutions',
            'subtitle' => 'About Company',
            'description' => 'Jood Medical is an integrated digital system for managing and operating clinics and medical centres, connecting management, medical staff, patients, and medical support services through a single platform.',
        ]);




        // section 7 = case studies
        CmsSection::create([
            'cms_page_id' => 2,
            'name' => 'Case Studies',
            'type' => 'case-studies',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 4,
            'is_active' => 1,
        ]);

        // case studies section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 7,
            'locale' => 'en',
            'title' => 'We Delivered Best Solution',
            'subtitle' => 'FROM OUR CASE studies',
            'description' => '',
        ]);




        // section 8 = technologies
        CmsSection::create([
            'cms_page_id' => 2,
            'name' => 'Technologies',
            'type' => 'technologies',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 5,
            'is_active' => 1,
        ]);

        // technologies section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 8,
            'locale' => 'en',
            'title' => 'Enhance and Pioneer Using Technology Trends',
            'subtitle' => 'Our Offering',
            'description' => '',
        ]);




        // section 9 = development process
        CmsSection::create([
            'cms_page_id' => 2,
            'name' => 'Development Process',
            'type' => 'development-process',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 6,
            'is_active' => 1,
        ]);

        // development process section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 9,
            'locale' => 'en',
            'title' => 'Our Development Process',
            'subtitle' => 'Work Process',
            'description' => '',
        ]);

        // section 10 = contact us
        CmsSection::create([
            'cms_page_id' => 2,
            'name' => 'Contact Us',
            'type' => 'contact-us',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 7,
            'is_active' => 1,
        ]);

        // contact us section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 10,
            'locale' => 'en',
            'title' => 'Your satisfaction matters to us.',
            'subtitle' => 'Clients Review',
            'description' => 'Please share your message using the form below, and our support team will follow up with you shortly.',
        ]);




        // section 11 = get in touch
        CmsSection::create([
            'cms_page_id' => 2,
            'name' => 'Get In Touch',
            'type' => 'get-in-touch',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 8,
            'is_active' => 1,
        ]);

        // talk to us section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 11,
            'locale' => 'en',
            'title' => 'How May We Help You!',
            'subtitle' => 'Talk to Us',
            'description' => '',
        ]);




        // about page sections
        // section 12 = who we are
        CmsSection::create([
            'cms_page_id' => 3,
            'name' => 'Who We Are',
            'type' => 'who-we-are',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 1,
            'is_active' => 1,
        ]);
        // who we are section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 12,
            'locale' => 'en',
            'title' => 'Ensuring Your Success Through Reliable IT Solutions',
            'subtitle' => 'Who We Are',
            'description' => 'Jood Medical is an integrated digital system for managing and operating clinics and medical centres, connecting management, medical staff, patients, and medical support services through a single platform. The system aims to transform into a smart health platform that supports doctors in decision-making and helps patients access preliminary diagnoses and referrals to the appropriate doctor and specialisation, while ensuring that the final medical decision remains in the hands of the doctor.',
        ]);




        // section 13 = our info
        CmsSection::create([
            'cms_page_id' => 3,
            'name' => 'Our Info',
            'type' => 'our-info',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 2,
            'is_active' => 1,
        ]);
        // our info section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 13,
            'locale' => 'en',
            'title' => 'Our Info',
            'subtitle' => 'Our Info',
            'description' => '',
        ]);




        // service solutions page sections
        // section 14 = technical solutions
        CmsSection::create([
            'cms_page_id' => 4,
            'name' => 'Technical Solutions',
            'type' => 'technical-solutions',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 1,
            'is_active' => 1,
        ]);

        // technical solutions section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 14,
            'locale' => 'en',
            'title' => 'Problem Clinics and patients suffer from',
            'subtitle' => 'Technical Solutions',
            'description' => 'Pressure on doctors and a high number of repeat cases. Patients being referred to the wrong doctor, wasting time and resources. Lack of tools to assist doctors in analysing clinical data. Non-integrated operational systems (appointments, inventory, billing). A disjointed patient experience from booking to payment.',
        ]);





        // section 15 = services
        CmsSection::create([
            'cms_page_id' => 4,
            'name' => 'Services',
            'type' => 'services',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 2,
            'is_active' => 1,
        ]);

        // services section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 15,
            'locale' => 'en',
            'title' => 'Jood Medical provides a unified platform that includes',
            'subtitle' => '',
            'description' => '',
        ]);





        // services page sections
        // section 16 = services
        CmsSection::create([
            'cms_page_id' => 5,
            'name' => 'Services',
            'type' => 'services',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 1,
            'is_active' => 1,
        ]);

        // services page section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 16,
            'locale' => 'en',
            'title' => 'Our Services',
            'subtitle' => '',
            'description' => '',
        ]);




        // faq page sections
        // section 17 = faqs
        CmsSection::create([
            'cms_page_id' => 6,
            'name' => 'FAQs',
            'type' => 'faqs',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 1,
            'is_active' => 1,
        ]);

        // faqs section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 17,
            'locale' => 'en',
            'title' => 'Most Common Question?',
            'subtitle' => 'FAQs',
            'description' => '',
        ]);




        // contact page sections
        // section 18 = contact info
        CmsSection::create([
            'cms_page_id' => 7,
            'name' => 'Contact Info',
            'type' => 'contact-info',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 1,
            'is_active' => 1,
        ]);
        // contact info section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 18,
            'locale' => 'en',
            'title' => 'Contact Information',
            'subtitle' => 'Contact Info',
            'description' => 'For any inquiries or additional information, please feel free to contact us using the details below. Our team will be happy to assist you.',
        ]);




        // section 19 = get in touch
        CmsSection::create([
            'cms_page_id' => 7,
            'name' => 'Get In Touch',
            'type' => 'get-in-touch',
            'template' => 'template-1',
            'settings' => json_encode([]),
            'order' => 2,
            'is_active' => 1,
        ]);

        // get in touch section translation
        CmsSectionTranslation::create([
            'cms_section_id' => 19,
            'locale' => 'en',
            'title' => 'Have a question or need more information?',
            'subtitle' => 'Get in Touch',
            'description' => 'Our team is here to help. Please fill out the form below, and we will get back to you as soon as possible. We value your time and look forward to assisting you.',
        ]);
    }
}