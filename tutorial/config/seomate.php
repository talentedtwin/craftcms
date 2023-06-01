<?php

return [
    'defaultMeta' => [
        'title' => ['globalSeo.seoTitle'],
        'description' => ['globalSeo.seoDescription'],
        'image' => ['globalSeo.seoImages']
    ],

    'defaultProfile' => 'standard',
    
    'fieldProfiles' => [
        'standard' => [
            'title' => ['seoTitle', 'heading', 'title'],
            'description' => ['seoDescription', 'summary'],
            'image' => ['seoImage', 'mainImage']
        ],
        'blogprofile' => [
            'title' => ['seoTitle', 'heading', 'title'],
            'og:title' => ['ogTitle', 'heading', 'title'],
            'description' => ['seoDescription', 'newsExcerpt', 'introText'],
            'image' => ['seoImage', 'heroImage', 'newsBlocks.image:image']
            'og:image' => ['ogImage', 'heroImage', 'newsBlocks.image:image']
            'twitter:image' => ['twitterImage', 'heroImage', 'newsBlocks.image:image']
        ]
    ],

    'profileMap' => [
        'blog' => 'blogprofile',
    ], 
    
    'additionalMeta' => [
        'og:type' => 'website',
        'twitter:card' => 'summary_large_image',
        
        'fb:profile_id' => '{{ settings.facebookProfileId }}',
        'twitter:site' => '@{{ settings.twitterHandle }}',
        'twitter:author' => '@{{ settings.twitterHandle }}',
        'twitter:creator' => '@{{ settings.twitterHandle }}',
        
        'og:see_also' => function ($context) {
            $someLinks = [];
            $matrixBlocks = $context['globalSeo']?->someLinks?->all();
            
            if (!empty($matrixBlocks)) {
                foreach ($matrixBlocks as $matrixBlock) {
                    $someLinks[] = $matrixBlock->someLinkUrl ?? '';
                }
            }
            
            return $someLinks;
        },
    ],
];