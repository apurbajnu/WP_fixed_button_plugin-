<?Php


class WP_fixed_button{


    public $options_value;
    public $css_options_value;
    private $html_config;
    private $ap_number_of_button;

    private $name_button;
    private  $button_name;
    function __construct(){

        add_action('wp_head', array($this,'add_button'));


    }

    public function add_button(){
        $this->options_value = get_option('wedevs_basics');
        $this->ap_number_of_button = $this->options_value['number_input'];

        $this->name_button = explode(",",$this->options_value['textarea']);

        $this->html_config .= "<div class=\"fixed_button\">";

         for($i = 0; $i<$this->ap_number_of_button; $i++){

             $this->button_name = (($this->name_button[$i])!== null)?$this->name_button[$i]:"Default";

             $this->html_config .= "<a href=\"#\" class=\"linked\">".$this->button_name."</a>";

         }



        $this->html_config .= "</div>";

        echo $this->html_config;

        echo $this->button_style();

    }

    public function button_style(){

        $this->css_options_value = get_option('wedevs_advanced');
        var_dump($this->css_options_value);
        ?>
        <style>

            .fixed_button {
                position: fixed;
                top: 150px;
                z-index: 1000000;
                left: -29px;
                width: auto;
                height: auto;
                padding: 50px 25px;
            }

            .fixed_button a {
                color: #fff;
                background:<?php echo (!empty($this->css_options_value['color']))? ($this->css_options_value['color']): "#009ada"; ?>;
                border: 1px solid #A95A5A;
                padding: 25px;
                display: block;
                margin: 10px 0;
                border-radius: 5px;
            }


        <?php

    }




}

new wp_fixed_button();
?>
