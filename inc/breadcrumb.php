<?php

    // Define the fixed value for Level 1 and Level 3
    $level1 = '<a href="/yoga-poses-library/">Home Library</a>';
    $level3 = '<a href="/blog/yoga-poses/">Asana Guide</a>';

    // Define an array for Level 2 URLs and their corresponding names
    $level2_urls = array(
        // Types
        '/standing-yoga-poses/' => 'Standing Poses',
        '/seated-yoga-poses/' => 'Seated Poses',
        '/forward-bend-yoga-poses/' => 'Forward-bend Poses',
        '/back-bend-yoga-poses/' => 'Back-bend Poses',
        '/twist-yoga-poses/' => 'Twist Poses',
        '/inversion-yoga-poses/' => 'Inversion Poses',
        '/arm-balance-yoga-poses/' => 'Arm-balance Poses',
        '/preparatory-yoga-poses/' => 'Preparatory Poses',
        '/restorative-yoga-poses/' => 'Restorative Poses',
        // Levels
        '/beginner-yoga-poses/' => 'Beginner Poses',
        '/intermediate-yoga-poses/' => 'Intermediate Poses',
        '/advanced-yoga-poses/' => 'Advanced Poses',
        // Benefits
        '/calming-yoga-poses/' => 'Calming Poses',
        '/energizing-yoga-poses/' => 'Energizing Poses',
        '/balancing-yoga-poses/' => 'Balancing Poses',
        '/grounding-yoga-poses/' => 'Grounding Poses', 
        // Sun Salutations
        '/sun-salutation/' => 'Sun Salutation',
        '/sun-salutation-a/' => 'Sun Salutation A',
        '/sun-salutation-b/' => 'Sun Salutation B',
        // Names-index
        '/blog/yoga-poses-index/' => 'Names Index',
    );

    // Check if the current URL matches one of the specified URLs for Level 2
    $current_url = $_SERVER['REQUEST_URI'];
    if (array_key_exists($current_url, $level2_urls)) {
        $last_url = $current_url;
        $level2_name = $level2_urls[$current_url];
        $level2 = '<a href="' . $current_url . '">' . $level2_name . '</a>';
    } else {
        if(isset($_SERVER['HTTP_REFERER'])){
            $last_url = $_SERVER['HTTP_REFERER'];
            foreach ($level2_urls as $url => $name) {
                if (strpos($last_url, $url) !== false) {
                    $level2 = '<a href="' . $url . '">' . $name . '</a>';
                    break;
                }
            }
        }else{
            $level2 = '';
        }
    }

    // Generate the breadcrumb based on the levels that are present
    if ($current_url == '/blog/yoga-poses/') {
        if (empty($level2)) {
            $breadcrumb = $level1 . ' > ' . $level3;
        } else {
            $breadcrumb = $level1 . ' > ' . $level2 . ' > ' . $level3;
        }
    } else {
        $breadcrumb = $level1;
        if (!empty($level2)) {
            $breadcrumb .= ' > ' . $level2;
        }
    }

    // Output the breadcrumb
    echo $breadcrumb;

?>