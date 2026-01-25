<?php

namespace Database\Seeders;

use App\Models\CmsItem;
use App\Models\CmsItemTranslation;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // home page items
        // section 1 = hero items
        $heroSectionItem1 = CmsItem::create([
            'cms_section_id' => 4,
            'slug' => 'hero-item-1',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);

        // section 1 = hero items
        $heroSectionItem2 = CmsItem::create([
            'cms_section_id' => 4,
            'slug' => 'hero-item-2',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);

        // section 2 items : what we offer items
        // item 1 : software development
        $whatWeOfferSectionItem1 = CmsItem::create([
            'cms_section_id' => 5,
            'slug' => 'software-development',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whatWeOfferSectionItem1->id,
            'locale' => 'en',
            'title' => 'Software Development',
            'sub_title' => '',
            'content' => 'Transform your ideas into powerful applications. Our custom software development services deliver scalable, secure, and user-friendly solutions tailored to your unique business needs.
					',
        ]);

        // item 2 : AI & Data Analytics
        $whatWeOfferSectionItem2 = CmsItem::create([
            'cms_section_id' => 5,
            'slug' => 'ai-and-data-analytics',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whatWeOfferSectionItem2->id,
            'locale' => 'en',
            'title' => 'AI & Data Analytics',
            'sub_title' => '',
            'content' => 'Unlock the power of your data with artificial intelligence and advanced analytics. Make informed decisions backed by actionable insights and predictive intelligence. ',
        ]);

        // item 3 : IT Consulting
        $whatWeOfferSectionItem3 = CmsItem::create([
            'cms_section_id' => 5,
            'slug' => 'it-consulting',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 3,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whatWeOfferSectionItem3->id,
            'locale' => 'en',
            'title' => 'IT Consulting',
            'sub_title' => '',
            'content' => 'Navigate complex technology challenges with expert guidance. Our strategic IT consulting helps you optimize processes, reduce costs, and achieve your digital transformation goals. ',
        ]);

        // item 4 : Technical Support
        $whatWeOfferSectionItem4 = CmsItem::create([
            'cms_section_id' => 5,
            'slug' => 'technical-support',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 4,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whatWeOfferSectionItem4->id,
            'locale' => 'en',
            'title' => 'Technical Support',
            'sub_title' => '',
            'content' => 'Experience reliable 24/7 technical support that keeps your systems running smoothly. Our dedicated team resolves issues quickly to minimize downtime and maximize productivity. ',
        ]);

        // section 3 items : about items
        // item 1 : Development
        $aboutSectionItem1 = CmsItem::create([
            'cms_section_id' => 6,
            'slug' => 'development',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $aboutSectionItem1->id,
            'locale' => 'en',
            'title' => 'Development',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 2 : Support & Maintenance
        $aboutSectionItem2 = CmsItem::create([
            'cms_section_id' => 6,
            'slug' => 'support-and-maintenance',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $aboutSectionItem2->id,
            'locale' => 'en',
            'title' => 'Support & Maintenance',
            'sub_title' => '',
            'content' => '',
        ]);

        // section 4 items
        // item 1 : IT Consulting
        $caseStudiesSectionItem1 = CmsItem::create([
            'cms_section_id' => 7,
            'slug' => 'it-consulting',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $caseStudiesSectionItem1->id,
            'locale' => 'en',
            'title' => 'IT Consulting',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 2 :Software Development
        $caseStudiesSectionItem2 = CmsItem::create([
            'cms_section_id' => 7,
            'slug' => 'software-development',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $caseStudiesSectionItem2->id,
            'locale' => 'en',
            'title' => 'Software Development',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 3 :AI & Data Analytics
        $caseStudiesSectionItem3 = CmsItem::create([
            'cms_section_id' => 7,
            'slug' => 'ai-and-data-analytics',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 3,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $caseStudiesSectionItem3->id,
            'locale' => 'en',
            'title' => 'AI & Data Analytics',
            'sub_title' => '',
            'content' => '',
        ]);

        // section 5 items
        // item 1 : Website
        $technologiesSectionItem1 = CmsItem::create([
            'cms_section_id' => 8,
            'slug' => 'website',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technologiesSectionItem1->id,
            'locale' => 'en',
            'title' => 'Website',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 2 : Android
        $technologiesSectionItem2 = CmsItem::create([
            'cms_section_id' => 8,
            'slug' => 'android',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technologiesSectionItem2->id,
            'locale' => 'en',
            'title' => 'Android',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 3 : IOS
        $technologiesSectionItem3 = CmsItem::create([
            'cms_section_id' => 8,
            'slug' => 'ios',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technologiesSectionItem3->id,
            'locale' => 'en',
            'title' => 'IOS',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 4 : Watch
        $technologiesSectionItem4 = CmsItem::create([
            'cms_section_id' => 8,
            'slug' => 'watch',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technologiesSectionItem4->id,
            'locale' => 'en',
            'title' => 'Watch',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 5 : Tv
        $technologiesSectionItem5 = CmsItem::create([
            'cms_section_id' => 8,
            'slug' => 'tv',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technologiesSectionItem5->id,
            'locale' => 'en',
            'title' => 'Tv',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 6 : IOT
        $technologiesSectionItem6 = CmsItem::create([
            'cms_section_id' => 8,
            'slug' => 'iot',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technologiesSectionItem6->id,
            'locale' => 'en',
            'title' => 'IOT',
            'sub_title' => '',
            'content' => '',
        ]);

        // section 6 items

        // item 1 : IOT
        $developmentProcessSectionItem1 = CmsItem::create([
            'cms_section_id' => 9,
            'slug' => 'discovery-and-planning',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $developmentProcessSectionItem1->id,
            'locale' => 'en',
            'title' => 'Discovery & Planning',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 2 : Design & Architecture
        $developmentProcessSectionItem2 = CmsItem::create([
            'cms_section_id' => 9,
            'slug' => 'design-and-architecture',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $developmentProcessSectionItem2->id,
            'locale' => 'en',
            'title' => 'Design & Architecture',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 3 : Development
        $developmentProcessSectionItem3 = CmsItem::create([
            'cms_section_id' => 9,
            'slug' => 'development',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 3,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $developmentProcessSectionItem3->id,
            'locale' => 'en',
            'title' => 'Development',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 4 : Testing & QA
        $developmentProcessSectionItem4 = CmsItem::create([
            'cms_section_id' => 9,
            'slug' => 'testing-and-qa',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 4,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $developmentProcessSectionItem4->id,
            'locale' => 'en',
            'title' => 'Testing & QA',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 5 : Deployment
        $developmentProcessSectionItem5 = CmsItem::create([
            'cms_section_id' => 9,
            'slug' => 'deployment',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 5,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $developmentProcessSectionItem5->id,
            'locale' => 'en',
            'title' => 'Deployment',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 6 : Support & Maintenance
        $developmentProcessSectionItem6 = CmsItem::create([
            'cms_section_id' => 9,
            'slug' => 'support-and-maintenance',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 6,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $developmentProcessSectionItem6->id,
            'locale' => 'en',
            'title' => 'Support & Maintenance',
            'sub_title' => '',
            'content' => '',
        ]);

        // section 12 items (who we are section items)
        // item 1 : Discovery & Planning
        $whoWeAreSectionItem1 = CmsItem::create([
            'cms_section_id' => 12,
            'slug' => 'discovery-and-planning',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whoWeAreSectionItem1->id,
            'locale' => 'en',
            'title' => 'Discovery & Planning',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 2 : Design & Architecture
        $whoWeAreSectionItem2 = CmsItem::create([
            'cms_section_id' => 12,
            'slug' => 'design-and-architecture',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whoWeAreSectionItem2->id,
            'locale' => 'en',
            'title' => 'Design & Architecture',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 3 : Development
        $whoWeAreSectionItem3 = CmsItem::create([
            'cms_section_id' => 12,
            'slug' => 'development',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 3,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whoWeAreSectionItem3->id,
            'locale' => 'en',
            'title' => 'Development',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 4 : Testing & QA
        $whoWeAreSectionItem4 = CmsItem::create([
            'cms_section_id' => 12,
            'slug' => 'testing-and-qa',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 4,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whoWeAreSectionItem4->id,
            'locale' => 'en',
            'title' => 'Testing & QA',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 5 : Deployment
        $whoWeAreSectionItem5 = CmsItem::create([
            'cms_section_id' => 12,
            'slug' => 'deployment',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 5,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whoWeAreSectionItem5->id,
            'locale' => 'en',
            'title' => 'Deployment',
            'sub_title' => '',
            'content' => '',
        ]);

        // item 6 : Support & Maintenance
        $whoWeAreSectionItem6 = CmsItem::create([
            'cms_section_id' => 12,
            'slug' => 'support-and-maintenance',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 6,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $whoWeAreSectionItem6->id,
            'locale' => 'en',
            'title' => 'Support & Maintenance',
            'sub_title' => '',
            'content' => '',
        ]);

        // section 13 items (our info section items)
        // item 1 : Vision
        $ourInfoSectionItem1 = CmsItem::create([
            'cms_section_id' => 13,
            'slug' => 'vision',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $ourInfoSectionItem1->id,
            'locale' => 'en',
            'title' => 'Vision',
            'sub_title' => '',
            'content' => 'To become the leading smart platform for managing and operating medical clinics, the primary decision-making support for doctors, and the primary digital gateway for patients to access appropriate healthcare.',
        ]);

        // item 2 : Our Mission
        $ourInfoSectionItem2 = CmsItem::create([
            'cms_section_id' => 13,
            'slug' => 'our-mission',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $ourInfoSectionItem2->id,
            'locale' => 'en',
            'title' => 'Our Mission',
            'sub_title' => '',
            'content' => 'To become the leading smart platform for managing and operating medical clinics, the primary decision-making support for doctors, and the primary digital gateway for patients to access appropriate healthcare. creat near 20 new jobs in saudi market Mission 1 “Introduce AI into the medical system to automate and enhance the patient experience. ”',
        ]);

        // item 3 : Our Goals
        $ourInfoSectionItem3 = CmsItem::create([
            'cms_section_id' => 13,
            'slug' => 'our-goals',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 3,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $ourInfoSectionItem3->id,
            'locale' => 'en',
            'title' => 'Our Goals',
            'sub_title' => '',
            'content' => 'Solutions that help businesses operate more efficiently, securely, and competitively. We focus on understanding our clients’ needs and providing technology-driven solutions that support long-term growth and success.',
        ]);

        // section 15 items (services section items)
        // item 1 :  Medical clinic management
        $technicalSolutionsSectionItem1 = CmsItem::create([
            'cms_section_id' => 15,
            'slug' => 'medical-clinic-management',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technicalSolutionsSectionItem1->id,
            'locale' => 'en',
            'title' => ' Medical clinic management',
            'sub_title' => '',
            'content' => 'Appointment and medical file management. Medical and administrative staff management. Operational and financial reports.',
        ]);

        // item 2 :  Clinical Decision Support
        $technicalSolutionsSectionItem2 = CmsItem::create([
            'cms_section_id' => 15,
            'slug' => 'clinical-decision-support',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technicalSolutionsSectionItem2->id,
            'locale' => 'en',
            'title' => 'Clinical Decision Support',
            'sub_title' => '',
            'content' => 'Compilation and analysis of patient data (symptoms, medical history, results). Proposing preliminary diagnoses and treatment options as an aid to the doctor only. Smart alerts for risks or conditions that require special attention. Supporting decision-making without compromising medical responsibility.',
        ]);

        // item 3 :  Patient assistance and medical guidance
        $technicalSolutionsSectionItem3 = CmsItem::create([
            'cms_section_id' => 15,
            'slug' => 'patient-assistance-and-medical-guidance',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 3,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technicalSolutionsSectionItem3->id,
            'locale' => 'en',
            'title' => 'Patient assistance and medical guidance',
            'sub_title' => '',
            'content' => 'Entering symptoms via the app. Access to a preliminary, non-binding diagnosis. Referring the patient to the most appropriate doctor or specialist. Reducing unnecessary visits and improving appointment utilisation.',
        ]);

        // item 4 : Inventory and pharmacy management
        $technicalSolutionsSectionItem4 = CmsItem::create([
            'cms_section_id' => 15,
            'slug' => 'inventory-and-pharmacy-management',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 4,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technicalSolutionsSectionItem4->id,
            'locale' => 'en',
            'title' => 'Inventory and pharmacy management',
            'sub_title' => '',
            'content' => 'Managing medicines and supplies. Alerts for shortages and expiry dates. Linking prescriptions to the pharmacy and invoices.',
        ]);

        // item 5 : Laboratories and imaging
        $technicalSolutionsSectionItem5 = CmsItem::create([
            'cms_section_id' => 15,
            'slug' => 'laboratories-and-imaging',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 5,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technicalSolutionsSectionItem5->id,
            'locale' => 'en',
            'title' => 'Laboratories and imaging',
            'sub_title' => '',
            'content' => "Manage laboratory and imaging requests. Link results to the patient's file. Speed up procedures and reduce errors.",
        ]);

        // item 6 : In-app payment
        $technicalSolutionsSectionItem6 = CmsItem::create([
            'cms_section_id' => 15,
            'slug' => 'in-app-payment',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 6,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $technicalSolutionsSectionItem6->id,
            'locale' => 'en',
            'title' => 'In-app payment',
            'sub_title' => '',
            'content' => 'Electronic invoices. Multiple digital payment methods. Direct link between services provided and financial collection.',
        ]);

        // section 16 items (services section items)
        // item 1 :  Medical clinic management
        $itServicesSectionItem1 = CmsItem::create([
            'cms_section_id' => 16,
            'slug' => 'database-security',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $itServicesSectionItem1->id,
            'locale' => 'en',
            'title' => 'Database Security',
            'sub_title' => '',
            'content' => 'Protect your critical business data from unauthorized access, breaches, and cyber threats with our advanced database security services. ',
        ]);

        // item 2 : IT Consulting
        $itServicesSectionItem2 = CmsItem::create([
            'cms_section_id' => 16,
            'slug' => 'it-consulting',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $itServicesSectionItem2->id,
            'locale' => 'en',
            'title' => 'IT Consulting',
            'sub_title' => '',
            'content' => 'Expert consulting to guide your technology strategy, improve workflows, and select the right tools and platforms for your business goals. ',

        ]);

        // item 3 : App Development
        $itServicesSectionItem3 = CmsItem::create([
            'cms_section_id' => 16,
            'slug' => 'app-development',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 3,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $itServicesSectionItem3->id,
            'locale' => 'en',
            'title' => 'App Development',
            'sub_title' => '',
            'content' => 'We design and build custom mobile and web applications that deliver high performance, intuitive user experiences, and seamless interaction across devices.',
        ]);

        // item 4 : Cyber Security
        $itServicesSectionItem4 = CmsItem::create([
            'cms_section_id' => 16,
            'slug' => 'cyber-security',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 4,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $itServicesSectionItem4->id,
            'locale' => 'en',
            'title' => 'Cyber Security',
            'sub_title' => '',
            'content' => 'Protect your digital systems, networks, and data with comprehensive cyber security solutions including firewalls, threat detection. ',
        ]);

        // item 5 : UI/UX Design
        $itServicesSectionItem5 = CmsItem::create([
            'cms_section_id' => 16,
            'slug' => 'ui-ux-design',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 5,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $itServicesSectionItem5->id,
            'locale' => 'en',
            'title' => 'UI/UX Design',
            'sub_title' => '',
            'content' => 'Our creative UI/UX design services ensure your applications and websites deliver intuitive and memorable user experiences.',
        ]);

        // item 6 : IT Management
        $itServicesSectionItem6 = CmsItem::create([
            'cms_section_id' => 16,
            'slug' => 'it-management',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 6,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $itServicesSectionItem6->id,
            'locale' => 'en',
            'title' => 'IT Management',
            'sub_title' => '',
            'content' => 'We offer comprehensive IT management services including infrastructure planning, system monitoring, performance optimization, and ongoing maintenance.',
        ]);

        // section 17 items (faq section items)
        // item 1 : What services does your company provide?
        $faqSectionItem1 = CmsItem::create([
            'cms_section_id' => 17,
            'slug' => 'what-services-does-your-company-provide',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 1,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $faqSectionItem1->id,
            'locale' => 'en',
            'title' => 'What services does your company provide?',
            'sub_title' => '',
            'content' => 'Our company offers a wide range of IT solutions including web development, mobile app development, cyber security, cloud & DevOps services, AI powered solutions, and expert IT consulting tailored to your business needs.',
        ]);
        // item 2 : How can I contact support team?
        $faqSectionItem2 = CmsItem::create([
            'cms_section_id' => 17,
            'slug' => 'how-can-i-contact-support-team',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 2,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $faqSectionItem2->id,
            'locale' => 'en',
            'title' => 'How can I contact support team?',
            'sub_title' => '',
            'content' => 'You can contact our support team via email, phone, or through the contact form on our website. Our support staff is ready to help you with any questions or requests.',
        ]);
        // item 2 : Do you offer free consultations?
        $faqSectionItem3 = CmsItem::create([
            'cms_section_id' => 17,
            'slug' => 'do-you-offer-free-consultations',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 3,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $faqSectionItem3->id,
            'locale' => 'en',
            'title' => 'Do you offer free consultations?',
            'sub_title' => '',
            'content' => 'Yes, we offer a free initial consultation to understand your requirements and recommend the best solution for your business.',
        ]);

        // item 4 : can your services be customized?
        $faqSectionItem4 = CmsItem::create([
            'cms_section_id' => 17,
            'slug' => 'can-your-services-be-customized',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 4,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $faqSectionItem4->id,
            'locale' => 'en',
            'title' => 'Can your services be customized?',
            'sub_title' => '',
            'content' => 'Absolutely! All our IT services are fully customizable to match your specific business goals and requirements.',
        ]);
        // item 5 : How do you ensure data security?
        $faqSectionItem5 = CmsItem::create([
            'cms_section_id' => 17,
            'slug' => 'how-do-you-ensure-data-security',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 5,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $faqSectionItem5->id,
            'locale' => 'en',
            'title' => 'How do you ensure data security?',
            'sub_title' => '',
            'content' => 'We follow industry leading security standards, implement robust encryption, access controls, and continuous monitoring to protect your systems and data from cyber threats.',
        ]);

        // item 6 : can i upgrade or cancel services anytime?
        $faqSectionItem6 = CmsItem::create([
            'cms_section_id' => 17,
            'slug' => 'can-i-upgrade-or-cancel-services-anytime',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 6,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $faqSectionItem6->id,
            'locale' => 'en',
            'title' => 'Can I upgrade or cancel services anytime?',
            'sub_title' => '',
            'content' => 'Yes, you can upgrade or cancel your services at any time. Just contact our support team to process your request quickly and easily.',
        ]);

        // item 7 : do you provide ongoing support after project delivery?
        $faqSectionItem7 = CmsItem::create([
            'cms_section_id' => 17,
            'slug' => 'do-you-provide-ongoing-support-after-project-delivery',
            'settings' => json_encode([]),
            'is_active' => 1,
            'order' => 7,
        ]);
        // item translation
        CmsItemTranslation::create([
            'cms_item_id' => $faqSectionItem7->id,
            'locale' => 'en',
            'title' => 'Do you provide ongoing support after project delivery?',
            'sub_title' => '',
            'content' => 'Yes. We provide continuous support and maintenance services to ensure your systems remain up to date, secure, and performing at their best.',
        ]);

    }
}