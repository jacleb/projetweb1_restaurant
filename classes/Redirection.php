<?php

class Redirection {

    /**
     * Redirects to a route   
     *
     * @param string $route Redirection route
     * @param string[]|null $get_parameters GET parameters to add to the redirection path
     * @return void
     */
    public static function redirect(string $route, $get_parameters = null){
        $path = $route;

        // GET parameters to add to the redirection path
        if ($get_parameters != null) {
            $path .= "?";

            // Adds & enters the GET parameters to the path if there are more than one
            $counter = 0;
            foreach ($get_parameters as $nom => $value) {
                if ($counter > 0) {
                    $path .= "&";
                }

                $path .= $nom . "=" . $value;
                $counter++;
            }
        }
        
        // Redirection
        header("location:" . $path);
        exit();
    }
}

?>