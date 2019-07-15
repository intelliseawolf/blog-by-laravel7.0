<?php

namespace App\Services\Sections;

class ContactSectionService
{
    /**
     * Gets the contact data.
     *
     * @return array The contact data.
     */
    public function getSectionData()
    {
        return [
            'enabled'       => true,
            'navTitle'      => 'Contact',
            'sectionTitle'  => 'Contact Me',
            'textTitle'     => 'Feel free to contact me!',
            'textContent'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolores, quasi unde quisquam facilis at ullam aperiam similique dicta voluptatibus!',
            'phone' => [
                'enabled'   => true,
                'icon'      => 'fa-phone',
                'text'      => '503.619.6366',
                'link'      => 'tel:1-503-619-6366',
            ],
            'email' => [
                'enabled'   => true,
                'icon'      => 'fa-envelope',
                'text'      => 'jeremykenedy@gmail.com',
                'link'      => 'mailto:jeremykenedy@gmail.com',
            ],
            'time' => [
                'enabled'   => true,
                'icon'      => 'fa-clock-o',
                'text'      => 'Pacific Standard Time',
            ],
            'location' => [
                'enabled'   => true,
                'icon'      => 'fa-map-marker',
                'text'      => 'Portland, OR, USA',
            ],
            'form' => [
                'labels'  => [
                    'name'      => 'Name*',
                    'email'     => 'Email*',
                    'subject'   => 'Subject',
                    'message'   => 'Type your message here*',
                ],
                'messages' => [
                    'successMsg'        => 'Your message was sent!',
                    'serverErrorMsg'    => 'Server error',
                ],
                'submitButton' => 'Send message',
            ],
        ];
    }

}
