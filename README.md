# Intercom-WHMCS Script
Intercom Integration Script to WHMCS (Unofficial)
###### This script allows WHMCS users to connect their whmcs installation to Intercom seamlessly! Once installed, all customer data, information, and IP will be synchronized between Intercom & WHMCS. To also prevent spam/abuse, this script also tracks leads IP information. Additionally, there is a simple installation as well!

###### Notice: This code does not have any exploits nor does it share your information with anyone. Feel free to check the code out as it has no abusive features what so ever. The only job it does is connects to your whmcs database to sync data.

###### System Tracks:
Client Full Name
Client Email
Client Phone Number
Client IP Address
Client Phone Number
Client Status
Client Email Status
Client City/State/Country
Client Language
Client Credit Balance
& More!
---
Installation Steps

1) Download the Intercom.php file from our Github Repository.
2) Login to your Webhost's FTP. If you're using cPanel login and navigate to the File Manager.
3) Open this file under your WHMCS Installation. /home/(yourcpanelusername)/(yourwhmcsdomain)/templates/(yourcurrentwhmcstemplete)/header.tpl
4) On **Line 17 Under {$headeroutput}** paste the following code in written below.
5) On **Line 23 Update** the section **s.src='https://widget.intercom.io/widget/########';var** with your intercom app id.
6) Next time a user logs in or appears. Your system will be tracking their information!

>{php}
>require('intercom.php');
>{/php}
  ><script>
  >{literal}
  >(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/########';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()
>{/literal}
  ></script>
  

