<?Php


class WP_fixed_button{

    private $html_config;
    private $ap_number_of_button=2;

    private $name_button =array("First button", "2nd button");
    private  $button_name;
    function __construct(){

        add_action('wp_head', array($this,'add_button'));

    }

    public function add_button(){


        $this->html_config .= "<div class=\"fixed_button\">";

         for($i = 0; $i<$this->ap_number_of_button; $i++){

             $this->button_name = (($this->name_button[$i])!== null)?$this->name_button[$i]:"Default";

             $this->html_config .= "<a href=\"#\" class=\"linked\">".$this->button_name."</a>";

         }



        $this->html_config .= "</div>";

        echo $this->html_config;

    }


}

new wp_fixed_button();
?>
<style>

    .fixed_button {
        position: absolute;
        top: 150px;
        z-index: 1000000;
        left: -29px;
        width: auto;
        height: auto;
        padding: 50px 25px;
    }

    .fixed_button a {
        color: #fff;
        background: red;
        border: 1px solid #A95A5A;
        padding: 25px;
        display: block;
        margin: 10px 0;
        border-radius: 5px;
    }
</style>