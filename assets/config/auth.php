
<?php

return array(
    'domains' => array(
        'default' => array(
            'repository' => 'app.user',
            'providers' => array(
               'session' => array(
                    'type' => 'http.session'
                ),

                'password' => array(
                    'type' => 'login.password',
                    'persistProviders' => array('session')
                )
            )
        )
    )
);