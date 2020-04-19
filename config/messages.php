<?php


return [
    /*
     * Message types
     * 1)success
     * 2)error
     * 3)warning  => this has deleted ,in process or will be considered in future
     * 4)already  => this has already been done
     * 5)system   => all system generated messages related to key
     * */
    //Suggestion
    //here you can also style for css
    //system messages

    'default'=>[
        'errorKey' => 'error',
        'successKey' => 'success'
    ],

    'success'=>[
                'validation'=>[
                    'title'=>'Validation Error',
                    'message'=>'Please Correct these validation error',
                    'styles'=>[], // these would be handled in future
                    'systemMessages'=>[]
                ],
                'passwordReset'=>[
                    'title'=>'Password Changed!',
                    'message'=>'Your password has been changed',
                    'styles'=>[], // these would be handled in future
                    'systemMessages'=>[]
                ],
                'postRegister'=>[
                    'title' => '<strong>Thank you for Registration!</strong><br>',
                    'message'=> '<strong><i class="fa fa-check"></i></strong> Your registration is now complete.'
                ]
    ],

    'error'=>[
        'validation'=>[
            'title'=>'Validation Error',
            'message'=>'Please Correct these validation error',
            'styles'=>[], // these would be handled in future
            'systemMessages'=>[]
        ],
            'passwordReset'=>[
                'title'=>'<strong>Password reset error !!!</strong><br>',
                'message'=>'<p>There is some error while changing your password .Please try again</p>',
                'styles'=>[], // these would be handled in future
                'systemErrors'=>[]
            ],
            'login'=>[
                'title'=>'Error while Signing in',
                'message'=>'Email or password are not correct.Please try again'
            ],
            'activateAccount'=>[
                'title'  => '<strong>Some Thing is wrong!!!</strong>',
                'message'=> '<strong>Error Code :10 </strong><br/>
                                Email Verification problem Or Account has been disabled<br/>
                                Please contact with our team.'
            ],
            'isActiveOrExpiredAccount'=>[
                'title'  => '<strong>Account Activation!!!</strong>',
                'message'=> '<strong>Error </strong> Activation link has been expired.'
            ],
            'subscriptionSettings'=>[
                'title'  => '<strong>Subscription Settings!!!</strong>',
                'message'=> '<strong>Error </strong> Settings has no been saved.'
            ],
            'notLoggedIn'=>[
                'title'  => '<strong>LoggedIn Problem!!!</strong>',
                'message'=> '<strong>Error </strong> Something is wrong.'
            ],
            'profileInfoSettings'=>[
                'title'  => '<strong>Profile Info Settings!!!</strong>',
                'message'=> '<strong>Error </strong> Settings has not been saved.'
            ],
            'newAccountCreated'=>[
                'title' => '<strong>Registering Problem!</strong><br>',
                'message'=>'<strong>Error </strong> Something is wrong while registration.'
            ],
            'shippingInfo'=>[
                'title' => '<strong>Shipping Info !</strong><br>',
                'message'=> '<strong>Error </strong> Settings has not been saved.'
            ],
            'billingInfo'=>[
                'title' => '<strong>Billing Info!</strong><br>',
                'message'=> '<strong>Error </strong> Settings has not been saved.'
            ],
        'admin-login'=>[
            'title' => '<strong>LogIn Attempt failed</strong><br>',
            'message'=> '<strong>Error </strong> Email or password is not correct.'
        ],
        //Admin Messages
        'contestCategory'=>[
            'title' => '<strong>Contest Category!</strong><br>',
            'message'=> '<strong>Error </strong> Category has not been saved.'
        ],
        'contestQuestion'=>[
            'title' => '<strong>Question!</strong><br>',
            'message'=> '<strong>Error </strong> Question has not been saved.'
        ],
        'EditContestQuestion'=>[
            'title' => '<strong>Updating Question!</strong><br>',
            'message'=> '<strong>Error </strong> Question has not been updated.'
        ],
        'PrizeCategory'=>[
            'title' => '<strong>Prize Category!</strong><br>',
            'message'=> '<strong>Error </strong> Category has not been saved.'
        ],
        'AddPrize'=>[
            'title' => '<strong>Adding Prize !</strong><br>',
            'message'=> '<strong>Error </strong> Prize has not been saved.'
        ],
        'EditPrize'=>[
            'title' => '<strong>Edit Prize !</strong><br>',
            'message'=> '<strong>Error </strong> Prize has not been updated.'
        ],
        'Contest'=>[
            'title' => '<strong>Contest !</strong><br>',
            'message'=> '<strong>Error </strong> Contest has not been updated.'
        ],
        'AdminAddUsers'=>[
            'title' => '<strong>Adding Users !</strong><br>',
            'message'=> '<strong>Error </strong> Users has not been Added.'
        ],
        'AdminEditUsers'=>[
            'title' => '<strong>Editing Users !</strong><br>',
            'message'=> '<strong>Error </strong> Users has not been updated.'
        ],
        'AdminDeleteUsers'=>[
            'title' => '<strong>Deleting Users !</strong><br>',
            'message'=> '<strong>Error </strong> Users has not been deleted.'
        ],
        'AdminDeletePrize'=>[
            'title' => '<strong>Deleting Prize !</strong><br>',
            'message'=> '<strong>Error </strong> Prize has not been deleted.'
        ],
        'AdminDeleteContest'=>[
            'title' => '<strong>Deleting Contest !</strong><br>',
            'message'=> '<strong>Error </strong> Contest has not been deleted.'
        ],
        'EditContest'=>[
            'title' => '<strong>Editing Contest !</strong><br>',
            'message'=> '<strong>Error </strong> Contest has not been updated.'
        ],
        'AdminToggleContestStatus'=>[
            'title' => '<strong>Contest !</strong><br>',
            'message'=> '<strong>Error </strong> Contest status has not been changed.'
        ],
        'AdminToggleContestCategoryStatus'=>[
            'title' => '<strong>Contest Category !</strong><br>',
            'message'=> '<strong>Error </strong> Contest status has not been changed.'
        ],
        'AdminTogglePrizeCategoryStatus'=>[
            'title' => '<strong>Prize Category!</strong><br>',
            'message'=> '<strong>Error </strong> Prize Category status has not been changed.'
        ],
        'AdminTogglePrizeStatus'=>[
            'title' => '<strong>Prize !</strong><br>',
            'message'=> '<strong>Error </strong> Prize status has not been changed.'
        ],
        'AdminUpdateProfile'=>[
            'title' => '<strong>Profile!</strong><br>',
            'message'=> '<strong>Error </strong>Your profile has not been updated successfully'
        ],
        'JoiningContestBeforeLogInRequired'=>[ // see PostLogInActionEvent
            'title' => '<strong>Joining Contest</strong><br>',
            'message'=> '<strong>Oopz!!!</strong> Something wrong while joining contest.<strong>Please Try again</strong>'
        ],
    ],

    'warning'=>[
            'deleted'=>[
                    'activateAccount'=>[
                        'title' => '<strong>Account Information !</strong><br>',
                        'message'=> '<strong>Deleted </strong> This account has been deleted.'
                    ]
            ],
            'in-process'=>[
                'activateAccount'=>[
                    'title' => '<strong>Account Information !</strong><br>',
                    'message'=> '<strong>In Process </strong> activation is in process.'
                ],
            ],
            'in-future'=>[  ],
            'already'=>[
                'activateAccount'=>[
                    'title' => '<strong>Account activation !</strong><br>',
                    'message'=> 'This account is <strong>Already </strong> activated.'
                ],
                 'accountExist'=>[
                    'title' => '<strong>Account exist !</strong><br>',
                    'message'=> 'This account is <strong>Already </strong> exist.'
                ],
                'JoiningContestBeforeLogInRequired'=>[
                    'title' => '<strong>Joining Contest</strong><br>',
                    'message'=> '<strong>Oopz!!!</strong>you already have joined contest.<strong>Please join another</strong>'
                ],
            ],
            'not-existence'=>[
                'activateAccount'=>[
                    'title' => '<strong>Account activation !</strong><br>',
                    'message'=> '<strong>Not-existence </strong> This account does not exist.'
                ],
                'UserNotExist'=>[
                    'title'=>'User Not Exist',
                    'message'=>'User with this email doest not exist.Please sign up and try again.'
                ],
            ],
            'invalid'=>[
                'activateAccount'=>[
                    'title' => '<strong>Account activation !</strong><br>',
                    'message'=> '<strong>In valid state </strong> Please contact our our team.'
                ],
                'email'=>[
                    'title' => '<strong>Account activation!</strong><br>',
                    'message'=> '<strong>In valid email </strong> Please contact our our team.'
                ],
            ],
            'expired'=>[
                'activateAccount'=>[
                    'title' => '<strong>Account Information !</strong><br>',
                    'message'=> '<strong>Expired </strong> Please contact our our team.'
                ],
            ],
        'limit'=>[
            'reached'=>[
                'title' => '<strong>Joining Contest</strong><br>',
                'message'=> '<strong>Oopz sorry!!!</strong>contastent limit reached of this contest.<strong>Please join another</strong>'
            ],
        ]

    ],

    'system'=>[]

];