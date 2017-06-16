# Intercom-WHMCS Script
Intercom Intagration Script to WHMCS.
###### This script allows WHMCS users to connect there whmcs installation to Intercom! Once installed, everything will run automaticly. There is a simple install as well!
---
Installation Steps

1) Download the Intercom.php File.
2) Login to your cPanel FTP.
3) Open this file under your WHMCS Installation. /home/(yourcpanelusername)/(yourwhmcsdomain)/templates/(yourcurrentwhmcstemplete)/header.tpl
4) On Line 17 Under {headerinput} paste the following code in.
>{php}require('chat.php');{/php}
  ><script>
  >{literal}
  >(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/mt7vhvz6';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()
>{/literal}
  ></script>
  

