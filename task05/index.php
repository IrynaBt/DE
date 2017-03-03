<?php
$text = 'Sehr geehrter Herr Müller,
 
hier finden Sie meine private E-Mail-Adresse: heinz.mueller@gmx.de. Da ich aber gemerkt hatte, dass dieses System sämtliche E-Mails automatisch entfernt, versuche ich die Adresse anders zu übermitteln.
Sie erreichen mich also unter heinz.mueller[at]gmx.de oder h e i n z at m u e l l e r . d e. Order aber heinzpunktmueller(at)gmxpunktde.
 
Viele Grüße,
 
Heinz Müller

Dear Mr Müller,
 
here you find my private email: heinz@mueller.gmx.de. As I found out that this system removes the E-mails automatically, therfore I am trying to send you this message in a different way.
As mentioned you can contact me under this E-mail: heinz.mueller[äT]gmx.de or he i nz {At} mu e ll er . d e. or heinzdotmueller( ad )gmxdot.de.
 
Best regards,
 
Heinz Müller';

$emailHidden = preg_replace(
    '/[[\sA-Z0-9._%+-]+[ ]?[\(|\[\{]?(\s|@|at|äT|At|ad)[\)\]\}]?[ ]?[A-Z0-9.-]+[ ]?[\(]?(\.|dot)[)]?[ ]?[A-Z]{0,4}/i',
    '***E-MAIL HIDDEN***',
    $text
);


echo $emailHidden;
?>