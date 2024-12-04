<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_SocialShere extends Widget_Base {

    public function get_name() {
        return 'htmega-social-shere-addons';
    }
    
    public function get_title() {
        return __( 'Social Share', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-share';
    }
    
    public function get_categories() {
        return [ 'htmega-addons' ];
    }

    public function get_keywords() {
        return ['social share', 'elementor social share','share button', 'social', 'share', 'facebook', 'twitter', 'instagram', 'linkedin'];
    }

    public function get_help_url() {
        return 'https://wphtmega.com/docs/social-widgets/social-share-widget/';
    }

    public function get_script_depends() {
        return [
            'htmega-goodshare',
        ];
    }
    protected function is_dynamic_content():bool {
		return false;
	}
    protected function register_controls() {

        $this->start_controls_section(
            'social_media_sheres',
            [
                'label' => esc_html__( 'Social Share', 'htmega-addons' ),
            ]
        );
        
            $repeater = new Repeater();

            $repeater->add_control(
                'htmega_social_media',
                [
                    'label' => esc_html__( 'Social Media', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'facebook',
                    'options' => [
                        'facebook'      => esc_html__( 'Facebook', 'htmega-addons' ),
                        'twitter'       => esc_html__( 'Twitter', 'htmega-addons' ),
                        'googleplus'    => esc_html__( 'Google+', 'htmega-addons' ),
                        'pinterest'     => esc_html__( 'Pinterest', 'htmega-addons' ),
                        'linkedin'      => esc_html__( 'Linkedin', 'htmega-addons' ),
                        'tumblr'        => esc_html__( 'tumblr', 'htmega-addons' ),
                        'vkontakte'     => esc_html__( 'Vkontakte', 'htmega-addons' ),
                        'odnoklassniki' => esc_html__( 'Odnoklassniki', 'htmega-addons' ),
                        'moimir'        => esc_html__( 'Moimir', 'htmega-addons' ),
                        'livejournal'   => esc_html__( 'Live journal', 'htmega-addons' ),
                        'blogger'       => esc_html__( 'Blogger', 'htmega-addons' ),
                        'digg'          => esc_html__( 'Digg', 'htmega-addons' ),
                        'evernote'      => esc_html__( 'Evernote', 'htmega-addons' ),
                        'reddit'        => esc_html__( 'Reddit', 'htmega-addons' ),
                        'delicious'     => esc_html__( 'Delicious', 'htmega-addons' ),
                        'stumbleupon'   => esc_html__( 'Stumbleupon', 'htmega-addons' ),
                        'pocket'        => esc_html__( 'Pocket', 'htmega-addons' ),
                        'surfingbird'   => esc_html__( 'Surfingbird', 'htmega-addons' ),
                        'liveinternet'  => esc_html__( 'Liveinternet', 'htmega-addons' ),
                        'buffer'        => esc_html__( 'Buffer', 'htmega-addons' ),
                        'instapaper'    => esc_html__( 'Instapaper', 'htmega-addons' ),
                        'xing'          => esc_html__( 'Xing', 'htmega-addons' ),
                        'wordpress'     => esc_html__( 'WordPress', 'htmega-addons' ),
                        'baidu'         => esc_html__( 'Baidu', 'htmega-addons' ),
                        'renren'        => esc_html__( 'Renren', 'htmega-addons' ),
                        'weibo'         => esc_html__( 'Weibo', 'htmega-addons' ),
                        'skype'         => esc_html__( 'Skype', 'htmega-addons' ),
                        'telegram'      => esc_html__( 'Telegram', 'htmega-addons' ),
                        'viber'         => esc_html__( 'Viber', 'htmega-addons' ),
                        'whatsapp'      => esc_html__( 'Whatsapp', 'htmega-addons' ),
                        'line'          => esc_html__( 'Line', 'htmega-addons' ),
                    ],
                ]
            );

            $repeater->add_control(
                'htmega_social_title',
                [
                    'label'   => esc_html__( 'Title', 'htmega-addons' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__( 'Facebook', 'htmega-addons' ),
                ]
            );

            $repeater->add_control(
                'htmega_social_icon',
                [
                    'label'   => esc_html__( 'Icon', 'htmega-addons' ),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'=>'fab fa-facebook-square',
                        'library'=>'brands',
                    ],
                ]
            );
            
            $repeater->add_control(
                'normal_style_area_heading',
                [
                    'label' => esc_html__( 'Normal Style', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $repeater->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'social_rep_background',
                    'label' => esc_html__( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}',
                ]
            );

            $repeater->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'social_rep_border',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}',
                ]
            );

            $repeater->add_control(
                'hover_style_area_heading',
                [
                    'label' => esc_html__( 'Hover Style', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $repeater->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'social_rep_hover_background',
                    'label' => esc_html__( 'Hover Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover',
                ]
            );

            $repeater->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'social_rep_hover_border',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover',
                ]
            );

            $repeater->start_controls_tabs('social_content_area_tabs');

                $repeater->start_controls_tab(
                    'social_rep_style',
                    [
                        'label' => esc_html__( 'Title', 'htmega-addons' ),
                    ]
                );

                    $repeater->add_control(
                        'social_text_color',
                        [
                            'label'     => esc_html__( 'Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'   => '#000000',
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $repeater->add_control(
                        'social_text_hover_color',
                        [
                            'label'     => esc_html__( 'Hover color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                $repeater->end_controls_tab();// End Style tab

                // Start Icon tab
                $repeater->start_controls_tab(
                    'social_rep_icon_style',
                    [
                        'label' => esc_html__( 'Icon', 'htmega-addons' ),
                    ]
                );
                    
                    $repeater->add_control(
                        'normal_style_icon_heading',
                        [
                            'label' => esc_html__( 'Normal Style', 'htmega-addons' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );

                    $repeater->add_control(
                        'social_icon_color',
                        [
                            'label'     => esc_html__( 'Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}} i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}} svg path' => 'fill: {{VALUE}};',
                            ],
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'social_rep_icon_background',
                            'label' => esc_html__( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}} i',
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'social_rep_icon_border',
                            'label' => esc_html__( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}} i',
                        ]
                    );

                    $repeater->add_responsive_control(
                        'social_rep_icon_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}} i' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                            'separator'=>'after',
                        ]
                    );

                    $repeater->add_control(
                        'hover_style_icon_heading',
                        [
                            'label' => esc_html__( 'Hover Style', 'htmega-addons' ),
                            'type' => Controls_Manager::HEADING,
                        ]
                    );


                    $repeater->add_control(
                        'social_icon_hover_color',
                        [
                            'label'     => esc_html__( 'Hover color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover svg path' => 'fill: {{VALUE}};',
                            ],
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'social_rep_icon_hover_background',
                            'label' => esc_html__( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover i',
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'social_rep_icon_hover_border',
                            'label' => esc_html__( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-social-share {{CURRENT_ITEM}}:hover i',
                        ]
                    );

                $repeater->end_controls_tab();// End icon Style tab

            $repeater->end_controls_tabs();// Repeater Tabs end

            $this->add_control(
                'htmega_socialmedia_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'prevent_empty' => false,
                    'default' => [
                        [
                            'htmega_social_media' => 'facebook',
                            'htmega_social_title' => esc_html__( 'Facebook', 'htmega-addons' ),
                            'htmega_social_icon' => 'fab fa-facebook-square',
                        ],
                        [
                            'htmega_social_media' => 'twitter',
                            'htmega_social_title' => esc_html__( 'Twitter', 'htmega-addons' ),
                            'htmega_social_icon' => 'fab fa-twitter',
                        ],
                        [
                            'htmega_social_media' => 'googleplus',
                            'htmega_social_title' => esc_html__( 'Google Plus', 'htmega-addons' ),
                            'htmega_social_icon' => 'fab fa-google-plus-g',
                        ],
                    ],
                    'title_field' => '{{{ htmega_social_title }}}',
                ]
            );
            
            $this->add_control(
                'social_view',
                [
                    'label' => esc_html__( 'View', 'htmega-addons' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => false,
                    'options' => [
                        'icon'       => 'Icon',
                        'title'      => 'Title',
                        'icon-title' => 'Icon & Title',
                    ],
                    'default'      => 'icon',
                ]
            );

            $this->add_control(
                'show_counter',
                [
                    'label'        => esc_html__( 'Count', 'htmega-addons' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'htmega-addons' ),
                    'label_off'    => esc_html__( 'Hide', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'condition'    => [
                        'social_view!' => 'icon',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'social_icon_alignment',
                [
                    'label' => esc_html__( 'Alignment', 'htmega-addons' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'htmega-addons' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul' => 'text-align: {{VALUE}};',
                    ],
                    'default' => 'left',
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'htmega_socialshere_style_section',
            [
                'label' => esc_html__( 'Style', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_responsive_control(
                'social_shere_padding',
                [
                    'label' => esc_html__( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'social_shere_margin',
                [
                    'label' => esc_html__( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'social_shere_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%',],
                    'default' => [
                        'unit' => 'px',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'social_shere_border',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-social-share li',
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'social_shere_margin_box_shadow',
                    'label' => esc_html__( 'Box Shadow', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-social-share ul li',
                ]
            );

            $this->add_control(
                'icon_control_offset_toggle',
                [
                    'label' => esc_html__( 'Icon Settings', 'htmega-addons' ),
                    'type' => Controls_Manager::POPOVER_TOGGLE,
                    'label_off' => esc_html__( 'None', 'htmega-addons' ),
                    'label_on' => esc_html__( 'Custom', 'htmega-addons' ),
                    'return_value' => 'yes',
                    'condition'    => [
                        'social_view!' => 'title',
                    ],
                ]
            );

            $this->start_popover();

            $this->add_control(
                'icon_fontsize',
                [
                    'label' => esc_html__( 'Icon Font Size', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 20,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .htmega-social-share ul li > svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'separator' =>'before',
                ]
            );

            $this->add_control(
                'icon_height',
                [
                    'label' => esc_html__( 'Icon Height', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 42,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li i' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .htmega-social-share ul li svg' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'icon_line_height',
                [
                    'label' => esc_html__( 'Line Height', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 42,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li i' => 'line-height: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .htmega-social-share ul li svg' => 'line-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'icon_width',
                [
                    'label' => esc_html__( 'Icon Width', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 42,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li i' => 'width: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .htmega-social-share ul li svg' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'social_icon_border',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-social-share li i,{{WRAPPER}} .htmega-social-share li svg',
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'social_icon_background',
                    'label' => esc_html__( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-social-share li i,{{WRAPPER}} .htmega-social-share li svg',
                ]
            );

            $this->add_responsive_control(
                'social_icon_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share li i' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                        '{{WRAPPER}} .htmega-social-share li svg' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->end_popover();

            $this->add_control(
                'share_button_line_height',
                [
                    'label' => esc_html__( 'Button Line Height', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 42,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li' => 'line-height: {{SIZE}}{{UNIT}};',
                    ],
                    'condition'    => [
                        'social_view!' => 'icon',
                    ],
                ]
            );
            
            $this->add_control(
                'normal_style_title_heading',
                [
                    'label' => esc_html__( 'Title Style', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' => [
                        'social_view!' =>'icon',
                    ],
                ]
            );

            $this->add_responsive_control(
                'social_shere_title_padding',
                [
                    'label' => esc_html__( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-social-share ul li span.htmega-share-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'social_view!' =>'icon',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'selector' => '{{WRAPPER}} .htmega-social-share ul li span',
                    'condition' => [
                        'social_view!' =>'icon',
                    ],
                ]
            );

            $this->start_controls_tabs('social_share_style_tabs');

            // Start Icon tab
            $this->start_controls_tab(
                'social_share_normal_style',
                [
                    'label' => esc_html__( 'Normal', 'htmega-addons' ),
                ]
            );


                $this->add_control(
                    'social_shere_color',
                    [
                        'label'     => esc_html__( 'Color', 'htmega-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .htmega-social-share ul li' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .htmega-social-style-1 ul li svg path,{{WRAPPER}} .htmega-social-share ul li svg path' => 'fill: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'social_shere_background',
                        'label' => esc_html__( 'Background', 'htmega-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .htmega-social-share li',
                    ]
                );

            $this->end_controls_tab();// End Style tab

            // Start Icon tab
            $this->start_controls_tab(
                'social_share_hover_style',
                [
                    'label' => esc_html__( 'Hover', 'htmega-addons' ),
                ]
            );

                $this->add_control(
                    'social_shere_hover_color',
                    [
                        'label'     => esc_html__( 'Color', 'htmega-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .htmega-social-share ul li:hover' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .htmega-social-share ul li:hover svg path' => 'fill: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'social_shere_hover_background',
                        'label' => esc_html__( 'Background', 'htmega-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .htmega-social-share li:hover',
                    ]
                );

            $this->end_controls_tab();// End Style tab

            $this->end_controls_tabs();

        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $this->add_render_attribute( 'htmega_socialshere', 'class', 'htmega-social-share htmega-social-style-1' );
        if( $settings['social_view'] == 'icon-title' || $settings['social_view'] == 'title' ){
            $this->add_render_attribute( 'htmega_socialshere', 'class', 'htmega-social-view-' . esc_attr( $settings['social_view'] ) );
        }
             
        ?>
            <div <?php echo $this->get_render_attribute_string( 'htmega_socialshere' ); ?> >
                <ul>
                    <?php foreach ( $settings['htmega_socialmedia_list'] as $socialmedia ) :?>
                        <li class="elementor-repeater-item-<?php echo esc_attr( $socialmedia['_id']); ?>" data-social="<?php echo esc_attr( $socialmedia['htmega_social_media'] ); ?>" > 
                            <?php
                                if( $settings['social_view'] == 'icon' ){
                                    echo HTMega_Icon_manager::render_icon( $socialmedia['htmega_social_icon'], [ 'aria-hidden' => 'true' ] );
                                }elseif( $settings['social_view'] == 'title' ){
                                    echo sprintf('<span class="htmega-share-title">%1$s</span>', htmega_kses_title( $socialmedia['htmega_social_title'] ));
                                }else{
                                    echo sprintf('%1$s<span class="htmega-share-title">%2$s</span>', HTMega_Icon_manager::render_icon( $socialmedia['htmega_social_icon'], [ 'aria-hidden' => 'true' ] ), htmega_kses_title(  $socialmedia['htmega_social_title'] ));
                                }
                                if( $settings['show_counter'] == 'yes' ){
                                    echo '<span class="htmega-share-counter" data-counter="'.esc_attr( $socialmedia['htmega_social_media'] ).'"></span>';
                                }
                            ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php

    }

}

