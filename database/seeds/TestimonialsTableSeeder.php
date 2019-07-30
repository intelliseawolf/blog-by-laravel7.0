<?php

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedFakeItems = false;
        $seedRealItems = true;

        // Clear the table
        Testimonial::truncate();

        // Seed Fake Items
        if ($seedFakeItems) {
            factory(Testimonial::class, 12)->create();
        }

        // Seed the Real Items
        if ($seedRealItems) {
            $items = [
                [
                    'enabled'   => 1,
                    'author'    => 'Julian Canepa, Web Application Developer',
                    'content'   => 'Jeremy is an amazing developer, and one of the most talented web engineers I\'ve had the pleasure of working with. Jeremy brought his passion and expertise to Sq1, and helped our development team get to the next level. His contributions as both a technical leader and mentor revolutionized client projects and the team members working under his leadership.',
                    'icon'      => 'icon-profile-female',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'Donica Polce, Senior Project Manager',
                    'content'   => 'Jeremy came on board when the development team (and the company) was at its peak expansion. We were transitioning from a small agency to a national corporation and gaining more large-scale complex dev projects. We were in dire need of someone to help our systems and processes grow up to meet the demand of our projects. Jeremy quickly took the helm of leadership and implemented improved coding standards, version control, security, and more for our team. He was an incredible mentor as well as manager to the developers and consistently demonstrated that he had their backs. He never hesitated to help someone when it was asked and saved my butt on numerous occasions. He\'s fiercely passionate about his role, keeps his employees\' best interests at heart in all that he does, and encourages high standards for those around him. In addition to that, our clients loved him!',
                    'icon'      => 'icon-profile-female',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'Monnie, Hammill, Senior Developer',
                    'content'   => 'Jeremy is one of the most passionate coders I have ever met. I worked with him at Sq1, and as the department lead he was always excited to share his knowledge and latest discoveries with the team to encourage the constant learning that is necessary in this field. His enthusiasm is contagious and he continuously strives to help others improve. I admire and appreciate that he truly and consistently puts his team first. These are all valuable qualities in a lead and in a developer.',
                    'icon'      => 'icon-profile-female',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'Misha Petrov, Digital Developer at The Fiction Tribe ®',
                    'content'   => 'Few people have the opportunity to report to a Web Engineering Director who is also a coach and a mentor— but I did when I worked with Jeremy at Sq1.<br /><br />Jeremy was well-organized with all of the agency\'s projects and always tried to go out of his way to perfect each of the clients\' setups no matter how much effort that would take. I was particularly impressed with Jeremy\'s passion for development work during and after work hours. He was always taking his time after work to contribute to the community with his open-source projects. His ability to juggle multiple projects and still be focused and offer help to his interns was unlike any I\'ve seen or heard of before.<br /><br />Oh, and he would always bring the interns and other staff members for coffee after our morning meetings to get a chance to know each of us better.<br /><br />Jeremy would be a great asset to any team!',
                    'icon'      => 'icon-profile-male',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'Hanna Hallman, Associate Account Manager at Roundhouse',
                    'content'   => 'I worked with Jeremy during my time at Sq1. We hired Jeremy to lead our web development team as we began building out a custom learning management system. Jeremy jumped right in and helped create structure and processes where it was desperately needed. He was critical in getting sites up to security standards, creating process for QA/deployments, etc. <br /><br />Jeremy is incredibly passionate about his work. He takes time outside of work to continue to educate himself on updates and new things happening in the code world. This passion comes through in his work. <br /><br />He was great to work with and would be a solid asset to anyones dev team!',
                    'icon'      => 'icon-profile-female',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'Byron Chang, Developer',
                    'content'   => 'Jeremy has been pivotal in my growth as a relatively new developer. Always being supportive and guiding me in the right direction to continue elevating my programming skill set. Jeremy is kind and a fantastic mentor, his technical skill set is expansive and always knows where to look to find his answers. Jeremy is quick to define technical requirements that are on point and is an amazing communicator between clients, account executives, and development teams.<br /><br />Jeremy is passionate about his work and his enthusiasm is an inspiration to myself and others who work closely with him. I consider myself lucky to have had him as my manager.',
                    'icon'      => 'icon-profile-male',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'Andrew Elliott, Web developer at Rubicon International',
                    'content'   => 'I worked with Jeremy at Rubicon International. He worked on a few different projects. One project was our main web application, which needed updates to the user interface. Jeremy improved the styling and layout. We also needed a token authentication service for an API we built and he provided that for us in a timely manner. He provided good documentation for the service. He was eager to find other ways to help with the projects.',
                    'icon'      => 'icon-profile-male',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'Ryan Back, Software Engineer at FocusVision',
                    'content'   => 'Jeremy is the manager we/’d always needed in our office. His programming knowledge has been a huge benefit for our team! Jeremy has a great ability to not only get the job done very well, but to also teach all of the other developers with clarity and patience. Jeremy strives to support, and encourage, best practices across the board with whatever language or technology he works with; be it Laravel, vanilla PHP, SASS, JavaScript, etc.<br /><br />Jeremy is always finding new ways to improve his work which, in turn, pushes all of us to improve ours. Though the development field is ever-changing, and doing so quickly, Jeremy always seems to be at the forefront of new ideas. His pure excitement can be seen through the work he does on his own and on the job. This excitement is contagious!<br /><br />Beyond Jeremy/’s highly technical skills and breadth of development knowledge, he is a clear communicator between the development team, project managers, account executives, and clients. His ability to clearly define system requirements, scope work, and provide exceptional feedback truly encapsulates his skill and leadership.<br /><br />I feel very lucky to have the opportunity to work so closely with Jeremy as my boss, a friend, and a mentor!',
                    'icon'      => 'icon-profile-male',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'Keith Evans, Software Engineer at Airship',
                    'content'   => 'Jeremy is a great manager and lead developer. He is extremely knowledgeable about code and development ecosystems and is constantly learning more. I can\'t count the times he has come into work ready and excited to share with us something new he learned the night before.<br /><br />As a manager, Jeremy puts his developers first. That doesn\'t mean he does whatever we want, but it\'s clear that every decision he makes is with our best interests at heart. He encourages us and helps us grow as developers, and he has fostered an incredible, collaborative culture on our team.',
                    'icon'      => 'icon-profile-male',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'Erica (Garber) Nafziger, Managing Partner at Foundry 503',
                    'content'   => 'I worked with Jeremy during my time at Sq1 and was impressed by his knowledge and passion for development. He continually went above and beyond when answering questions or providing solutions to difficult problems. He is interested in getting to the root of a problem, rather than just creating a temporary fix, something I deeply appreciated about working with him.',
                    'icon'      => 'icon-profile-female',
                ],
                [
                    'enabled'   => 1,
                    'author'    => 'David Zumini, Managing Partner at Foundry 503',
                    'content'   => 'I worked with Jeremy for a year or so while I was at Sq1. While we worked on separate teams (I led our UX team, he led the Dev team), our projects often overlapped. It didn\'t take long to see that Jeremy is truly passionate about his work. He loves what he does, and it shows. Personally, I value that quite highly. You can train someone up to get experience, but it\'s difficult to instill a passion for the work. It\'s a quality that helps him excel in his work and lead his team of developers.<br /><br />I enjoyed working with Jeremy whenever the opportunity arose, and I\'d welcome the chance to do so again in the future!',
                    'icon'      => 'icon-profile-male',
                ],
            ];

            foreach ($items as $item) {
                $newTestimonial = Testimonial::create([
                    'enabled' => $item['enabled'],
                    'author'  => $item['author'],
                    'content' => $item['content'],
                    'icon'    => $item['icon'],
                ]);
            }
        }
    }
}
