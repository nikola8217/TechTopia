<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogs = array(
            array(
                "title" => 'Exploring the Exciting Features of the iPhone 14 Pro: A Glimpse into the Future',
                "img" => "../images/blog1.avif",
                "body" => "Apple has once again set the tech world abuzz with the release of their highly anticipated flagship smartphone, 
                the iPhone 14 Pro. Packed with cutting-edge features and innovative advancements, this device is poised to redefine the smartphone 
                experience. In this blog, we delve into the standout features of the iPhone 14 Pro and explore why it's generating so much 
                excitement among tech enthusiasts.<br><br>
                1. Stunning Display and ProMotion Technology:<br>
                The iPhone 14 Pro boasts a mesmerizing 6.7-inch Super Retina XDR display that sets new standards for visual excellence. 
                With its vibrant colors, deep blacks, and incredible contrast ratio, every image and video comes to life with stunning clarity. 
                The introduction of ProMotion technology brings a smooth and responsive 120Hz refresh rate, ensuring buttery-smooth scrolling 
                and seamless animations.<br><br>
                2. Powerful Performance with A15 Bionic Chip:<br>
                At the heart of the iPhone 14 Pro lies the mighty A15 Bionic chip, Apple's most advanced and powerful processor to date. 
                Built on a 5-nanometer architecture, this chip delivers unmatched performance, allowing for faster app launches, 
                smoother multitasking, and impressive gaming capabilities. The A15 Bionic also boasts improved power efficiency, 
                ensuring optimal battery life for all-day usage.<br><br>
                3. Enhanced Camera System: <br>
                Photography enthusiasts will be delighted by the iPhone 14 Pro's upgraded camera system. Equipped with a triple-lens setup, 
                including a wide, ultra-wide, and telephoto lens, capturing professional-grade photos and videos has never been easier. 
                The larger sensors and improved image signal processor (ISP) result in sharper details, reduced noise, and enhanced low-light 
                performance. Additionally, the introduction of ProRAW and ProRes video recording capabilities provides users with unprecedented 
                creative control over their content.<br><br>
                4. Advanced Privacy and Security Features: <br>
                Apple continues to prioritize user privacy and security, and the iPhone 14 Pro is no exception. Advanced features such as Face ID 
                facial recognition ensure secure access to your device, while the Secure Enclave and encrypted storage keep your sensitive data 
                protected. Additionally, the new Private Relay feature in iCloud+ enhances internet privacy by securely routing your web traffic 
                through two separate relays, providing anonymity and shielding your browsing habits from prying eyes.<br><br>
                The iPhone 14 Pro represents the pinnacle of Apple's innovation and showcases their commitment to delivering exceptional user experiences. 
                With its stunning display, powerful performance, advanced camera system, and robust security features, this device is set to elevate the 
                smartphone industry to new heights. Whether you're a tech enthusiast, a professional photographer, or simply someone who appreciates 
                cutting-edge technology, the iPhone 14 Pro is poised to impress and inspire.",
                "created_at" => date("Y-m-d H:i:s", strtotime("now"))
            ),
            array(
                "title" => 'Unleashing Creativity and Performance: A Closer Look at the New MacBook Pro',
                "img" => "../images/blog2.avif",
                "body" => "Apple's MacBook Pro has long been the go-to choice for professionals and creatives seeking powerful performance and 
                unmatched user experience. With the recent release of the new MacBook Pro, Apple has once again raised the bar in the world of 
                laptops. In this blog, we'll explore the exceptional features of the new MacBook Pro and discuss why it's the ultimate tool 
                for productivity, creativity, and innovation.<br><br>
                1. M1 Pro and M1 Max Chipsets:<br>
                At the heart of the new MacBook Pro lies the revolutionary M1 Pro and M1 Max chipsets. Built on a 10-core CPU architecture and 
                featuring up to 32 GPU cores, these powerful processors deliver unprecedented performance and efficiency. Whether you're editing 
                high-resolution videos, rendering complex 3D models, or running resource-intensive applications, the MacBook Pro's M1 Pro and M1 
                Max chipsets provide unmatched speed and responsiveness.<br><br>
                2. Stunning Liquid Retina XDR Display:<br>
                The new MacBook Pro boasts a breathtaking Liquid Retina XDR display that brings images and videos to life like never before. 
                With a brightness of up to 1600 nits and support for a wide P3 color gamut, every detail is vibrant, rich, and true to life. 
                Whether you're editing photos, designing graphics, or watching HDR content, the MacBook Pro's display ensures an immersive and 
                visually stunning experience.<br><br>
                3. Advanced Thermal Design: <br>
                To support the powerful performance of the M1 Pro and M1 Max chipsets, Apple has introduced an advanced thermal design in the new 
                MacBook Pro. A redesigned cooling system with an array of heat pipes and an enlarged vapor chamber ensures efficient heat dissipation, 
                allowing the laptop to sustain peak performance without compromising on thermals. This means you can push the MacBook Pro to its 
                limits without worrying about overheating or performance throttling.<br><br>
                4. Enhanced Keyboard and Connectivity: <br>
                Apple has further refined the keyboard on the new MacBook Pro, incorporating the improved Magic Keyboard with its reliable scissor 
                mechanism and comfortable typing experience. Additionally, the inclusion of an array of ports, including HDMI, SDXC, Thunderbolt 4, 
                and USB 4, ensures seamless connectivity and versatility for a wide range of peripherals and accessories.<br><br>
                5. Extended Battery Life:<br>
                The new MacBook Pro offers impressive battery life, allowing you to stay productive and creative for extended periods. 
                With optimizations in both hardware and software, the M1 Pro and M1 Max chipsets maximize power efficiency, providing up to 17 to 21 
                hours of web browsing and up to 20 hours of video playback, depending on the configuration.<br><br>
                The new MacBook Pro exemplifies Apple's commitment to pushing the boundaries of technology and empowering professionals and creatives. 
                With its powerful chipsets, stunning display, advanced thermal design, improved keyboard, and extended battery life, the MacBook Pro 
                sets a new standard for performance, productivity, and creativity. Whether you're a filmmaker, designer, developer, or anyone in 
                need of uncompromising power and reliability, the new MacBook Pro is poised to exceed your expectations and unleash your full 
                potential.",
                "created_at" => date("Y-m-d H:i:s", strtotime("now"))
            ),
            array(
                "title" => 'Unleashing the Future of Gaming: Exploring the Powerhouse That is the PlayStation 5',
                "img" => "../images/blog3.avif",
                "body" => "The PlayStation 5 (PS5) has taken the gaming world by storm since its highly anticipated release. With its cutting-edge 
                hardware, innovative features, and a library of stunning games, the PS5 represents a significant leap forward in the world of console 
                gaming. In this blog, we'll delve into the impressive features of the PlayStation 5 and discuss why it's a must-have for gamers 
                seeking the ultimate gaming experience.<br><br>
                1. Lightning-Fast Load Times with SSD:<br>
                One of the standout features of the PS5 is its lightning-fast solid-state drive (SSD). Say goodbye to long loading screens and 
                hello to near-instantaneous load times. With the PS5's SSD, games load in a matter of seconds, allowing you to jump into the action 
                without any delay. Whether you're exploring vast open worlds or engaging in fast-paced multiplayer battles, the SSD ensures a seamless 
                and immersive gaming experience.<br><br>
                2. Immersive Gameplay with DualSense Controller:<br>
                The PlayStation 5 introduces the DualSense controller, which revolutionizes the way you interact with games. With its haptic 
                feedback and adaptive triggers, the DualSense controller provides a heightened sense of immersion, allowing you to feel the impact 
                of in-game actions like never before. From the subtle vibrations of footsteps to the tension of drawing a bowstring, the DualSense 
                controller adds a new layer of realism to your gaming experience.<br><br>
                3. Stunning Visuals with 4K Graphics: <br>
                The PS5 delivers stunning visuals thanks to its powerful custom GPU that supports ray tracing and 4K resolution. Games come to life 
                with breathtaking graphics, vibrant colors, and enhanced details. Whether you're exploring detailed landscapes, battling enemies 
                in intense combat sequences, or enjoying cinematic storytelling, the PS5's 4K graphics ensure a visually spectacular gaming 
                experience.<br><br>
                4. Expansive Game Library: <br>
                The PlayStation 5 boasts an extensive and diverse game library that caters to all types of gamers. From immersive single-player adventures to intense 
                multiplayer experiences, the PS5 offers a wide range of games to suit every taste. Whether you're a fan of action, role-playing, sports, 
                or puzzle games, the PS5's library has something for everyone. Additionally, the backward compatibility feature allows you to enjoy a vast 
                selection of PlayStation 4 games on the new console.<br><br>
                The PlayStation 5 represents a significant milestone in console gaming, pushing the boundaries of technology and delivering an 
                unparalleled gaming experience. With its lightning-fast load times, innovative DualSense controller, stunning visuals, expansive 
                game library, and immersive audio, the PS5 has truly revolutionized the way we play games. Whether you're a casual gamer or a 
                hardcore enthusiast, the PlayStation 5 is a gateway to a new era of gaming and endless entertainment.",
                "created_at" => date("Y-m-d H:i:s", strtotime("now"))
            )
        );

        DB::table('blogs')->insert($blogs);
    }
}
