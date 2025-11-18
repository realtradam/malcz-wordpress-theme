<?php
class Pico_Details_Nav_Walker extends Walker_Nav_Menu {

    // Only called for submenus
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $has_children = in_array('menu-item-has-children', $item->classes);

        // Top-level item with children -> use <details>
        if ($depth === 0 && $has_children) {
            $output .= '<details class="dropdown">';
            $output .= '<summary role="button" class="outline contrast" data-theme="dark">' . esc_html($item->title) . '</summary>';
        } 
        // Top-level item WITHOUT children -> <li> with data-theme="dark"
        elseif ($depth === 0 && !$has_children) {
            $atts = [];
            $atts['href'] = !empty($item->url) ? esc_url($item->url) : '#';
            $attributes = '';
            foreach ($atts as $attr => $value) {
                $attributes .= " $attr=\"$value\"";
            }

            $output .= '<li data-theme="dark"><a' . $attributes . ' class="contrast">' . esc_html($item->title) . '</a>';
        }
        // Submenu items -> normal <li> without data-theme
        else {
            $atts = [];
            $atts['href'] = !empty($item->url) ? esc_url($item->url) : '#';
            $attributes = '';
            foreach ($atts as $attr => $value) {
                $attributes .= " $attr=\"$value\"";
            }

            $output .= '<li><a' . $attributes . ' class="contrast">' . esc_html($item->title) . '</a>';
        }
    }


    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $has_children = in_array('menu-item-has-children', $item->classes);

        if ($depth === 0 && $has_children) {
            $output .= '</details>';
        } else {
            $output .= '</li>';
        }
    }
}
