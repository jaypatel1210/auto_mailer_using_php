<?php
   include 'check-login.php';
   $isActive = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template 1 - Auto Mailer</title>
    <?php include 'allcss.php'; ?>
</head>
<body>
   <?php include 'navbar.php'; ?>

        <div class="container">

            <div class="float-right">
               <button class="btn btn-outline-primary" id="next-btn">Next <strong>&#8680;</strong></button>
            </div>

            <div class="text-center">
               <h3>
                  <strong>Edit Mail Template 1</strong>
               </h3>
            </div>
            
            <form id="mail-form">
               <div class="row">

                <div class="col-12">
                  <div class="md-form md-outline">
                     <input type="text" id="company-name" class="form-control">
                     <label>Enter Company Name</label>
                  </div>
               </div>

               <div class="col-12">
                  <div>
                  <label>Upload Logo</label>
                    <input type="file" class="form-control" name="uploadLogo" id="uploadLogo" accept='image/*' />
                    <!-- <img src="" alt="Logo" id="uploadedLogo"> -->
                  </div>
               </div>

               <div class="col-12">
                  <div class="md-form md-outline">
                     <input type="text" id="mail-title" class="form-control" value="Your Framer Web invite is here">
                     <label>Enter Mail Title</label>
                  </div>
               </div>

               <div class="col-12">
                  <div class="md-form md-outline">
                     <textarea id="mail-msg" class="md-textarea form-control" rows="3">Framer Web is a new prototyping tool for teams to make designs interactive in minutes, without code. Collaborate in real-time, leave comments and share your prototypes with stakeholders using a simple link.</textarea>
                     <label>Enter Message</label>
                  </div>
               </div>

               <div class="col-12" id="note-input-elm">
                  <div>
                     <div class="md-form md-outline">
                        <input type="text" id="noteinp1" 
                        data-id="1"
                        class="form-control noteInput" value="Import your work straight from Figma or Sketch to make it interactive.">
                        <label id="label1">Note 1</label>
                     </div>
                  </div>
                  <div>
                     <div class="md-form md-outline">
                        <input type="text" id="noteinp2" 
                        data-id="2"
                        class="form-control noteInput" value="Build beautiful transitions between screens with Magic Motion.">
                        <label id="label2">Note 2</label>
                     </div>
                  </div>
               </div>

               <div class="col-6 col-lg-2 col-md-2">
                  <button class="btn btn-outline-success btn-sm" id="add">add</button>
               </div>
               <div class="col-6 col-lg-2 col-md-2">
                  <button class="btn btn-outline-danger btn-sm" id="remove">Remove</button>
               </div>

               <div class="col-lg-8 col-md-8"></div>
               
               <div class="col-lg-6 col-12 col-md-6">
                  <div class="md-form md-outline">
                     <input type="text" id="website-link" class="form-control">
                     <label>Company WebSite Link</label>
                  </div>
               </div>
               <div class="col-lg-3 col-6 col-md-3 mt-lg-3">
                  <button class="btn btn-outline-success btn-sm" id="website-add">Add Website Link</button>
               </div>
               <div class="col-lg-3 col-6 col-md-3 mt-lg-3">
                  <button class="btn btn-outline-danger btn-sm" id="website-remove">Remove Website Link</button>
               </div>

            </div>
            </form>
            

         <div id="mailDesign">
                <style>
         
            body {
               padding-top: 0 !important;
               padding-bottom: 0 !important;
            }
         
            body.strip-padding {
               padding: 0;
               margin: 0;
            }
         
            @font-face {
               font-family: "Inter";
               src: url("https://fonts.gstatic.com/s/inter/v1/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hjp-Ek-_EeA.woff") format("woff");
               font-weight: 400;
               font-style: normal;
               font-display: swap;
            }
         
            @font-face {
               font-family: "Inter";
               src: url("https://fonts.gstatic.com/s/inter/v1/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuI6fAZ9hjp-Ek-_EeA.woff") format("woff");
               font-weight: 500;
               font-style: normal;
               font-display: swap;
            }
         
            @font-face {
               font-family: "Inter";
               src: url("https://fonts.gstatic.com/s/inter/v1/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuGKYAZ9hjp-Ek-_EeA.woff") format("woff");
               font-weight: 600;
               font-style: normal;
               font-display: swap;
            }
         
            @font-face {
               font-family: "Inter";
               src: url("https://fonts.gstatic.com/s/inter/v1/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuFuYAZ9hjp-Ek-_EeA.woff") format("woff");
               font-weight: 700;
               font-style: normal;
               font-display: swap;
            }
         
            /* Type */
            p,
            a,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            li,
            strong,
            span {
               font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
            }
         
            .marketing p,
            .marketing a,
            .marketing h1,
            .marketing h2,
            .marketing h3,
            .marketing h4,
            .marketing h5,
            .marketing h6,
            .marketing li,
            .marketing strong,
            .marketing span {
               font-family: "Inter", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
            }
         
            a[x-apple-data-detectors] {
               color: inherit !important;
               text-decoration: none !important;
               font-size: inherit !important;
               font-family: inherit !important;
               font-weight: inherit !important;
               line-height: inherit !important;
            }
         
            p,
            ul {
               font-size: 16px;
               line-height: 1.6 !important;
               margin: 0px !important;
               text-rendering: optimizeLegibility;
               -webkit-font-smoothing: antialiased;
               mso-line-height-rule: exactly;
            }
         
            p a,
            h1 a {
               color: #0099ff !important;
               text-decoration: underline;
               transition: color 0.2s;
            }
         
            h1 a {
               text-decoration: none;
            }
         
            p a:hover,
            h1 a:hover {
               color: #0077ff !important;
            }
         
            strong {
               font-weight: 600;
            }
         
            .headline-1 {
               font-size: 48px;
               line-height: 44px;
               margin: 0;
               padding: 0;
               letter-spacing: -0.03em;
               font-weight: 700;
               line-height: 1.2;
            }
         
            .headline-2 {
               font-size: 32px;
               line-height: 44px;
               margin: 0;
               padding: 0;
               letter-spacing: -0.03em;
               font-weight: 700;
               line-height: 1.3;
            }
         
            /* Space */
            .space-16 {
               height: 16px;
            }
         
            .space-20 {
               height: 20px;
            }
         
            .space-40 {
               height: 40px;
            }
         
            .space-60 {
               height: 60px;
            }
         
            /* Size */
            .size-m {
               font-size: 14px !important;
            }
         
            .size-l {
               font-size: 16px !important;
               line-height: 1.7 !important;
            }
         
            .size-xl {
               font-size: 18px !important;
               line-height: 1.6 !important;
               letter-spacing: -0.1 !important;
            }
         
            /* Mail description */
            .description-hidden {
               color: transparent;
               display: none;
               font-size: 0;
               height: 0;
               opacity: 0;
               visibility: hidden;
               width: 0;
            }
         
            .description-spacer {
               display: none;
               max-height: 0px;
               overflow: hidden;
            }
         
            /* Button */
            .button {
               background-color: #0099ff;
               color: #ffffff;
               display: inline-block;
               line-height: 40px;
               text-align: center;
               text-decoration: none;
               -webkit-text-size-adjust: none;
               letter-spacing: 0.2;
               border-radius: 10px;
               font-size: 16px;
               font-weight: 500;
               padding: 0 16px;
               transition: background-color 0.2s;
            }
         
            .button:hover {
               background-color: #0077ff !important;
            }
         
            .button.big {
               border-radius: 14px;
               font-size: 18px;
               font-weight: 600;
               padding: 7px 20px;
            }
         
            /* Logo */
            .logo-img {
               display: block;
               height: 34px;
            }
         
            .logo a {
               text-decoration: none;
               font-size: 16px;
               font-weight: 600;
               border: none;
            }
         
            .logo .logo-label {
               color: #000000;
            }
         
            @media (prefers-color-scheme: dark) {
               .logo .logo-label {
                  color: #ffffff !important;
               }
            }
         
            /* List */
            .list {
               padding: 0;
               margin: 0;
               padding-left: 16px;
            }
         
            /* Containers */
            .container {
               width: 100%;
               padding-top: 40px;
               padding-bottom: 40px;
            }
         
            .container.centered {
               width: 680px;
               max-width: 680px;
            }
         
            .strip-padding .container {
               padding: 40px;
            }
         
            .container.align-center h1,
            .container.align-center p {
               text-align: center;
            }
         
            /* Wrappers */
            .wrapper-text {
               padding-left: 2px;
               margin-top: 26px !important;
            }
         
            .wrapper-button {
               margin-top: 30px !important;
            }
         
            .wrapper-button.big {
               margin-top: 40px !important;
            }
         
            .wrapper-url {
               margin-top: 20px;
            }
         
            .wrapper-url span {
               color: #aaaaaa !important;
               overflow-wrap: break-word;
               word-wrap: break-word;
               word-break: break-all;
            }
         
            .wrapper-url span a,
            .wrapper-url p {
               color: #aaaaaa !important;
               font-size: 12px !important;
            }
         
            /* Footer */
            .footer {
               margin-top: 60px;
            }
         
            .footer.tight {
               margin-top: 40px;
            }
         
            .footer p {
               mso-cellspacing: 0px;
               mso-padding-alt: 0px;
               color: #aaaaaa;
               font-size: 12px !important;
            }
         
            .marketing .footer p {
               font-size: 14px !important;
            }
         
            /* Marketing */
            .marketing .image {
               margin: 0px auto;
               text-align: center;
               padding: 40px 0;
            }
         
            .marketing .image img {
               border-radius: 16px;
               overflow: hidden;
               width: 100%;
               max-width: 600px;
            }
         
            .marketing .content {
               padding-left: 40px;
               padding-right: 40px;
            }
         
            .marketing .content p,
            .marketing .content li {
               font-size: 18px;
               line-height: 1.6 !important;
               letter-spacing: -0.1 !important;
            }
         
            .marketing .list li {
               margin-top: 8px;
               margin-bottom: 8px;
            }
         
            .marketing .list li span {
               opacity: 0.75;
            }
         
            @media only screen and (max-width: 640px) {
               .container.centered {
                  width: 100% !important;
               }
         
               .strip-padding .container {
                  padding: 20px !important;
               }
         
               .size-xl {
                  font-size: 16px !important;
               }
         
               .headline-1 {
                  font-size: 32px !important;
                  line-height: 1.3 !important;
               }
         
               .headline-2 {
                  font-size: 28px !important;
                  line-height: 1.3 !important;
               }
         
               /* Marketing */
               .marketing .content {
                  padding: 0px !important;
               }
         
               .marketing .content p,
               .marketing .content li {
                  font-size: 16px !important;
               }
         
               @media only screen and (max-width: 425px) {
                  .headline-2 {
                     font-size: 24px !important;
                     line-height: 1.3 !important;
                  }
         
                  .button.big {
                     font-size: 16px !important;
                     border-radius: 10px !important;
                     font-weight: 500 !important;
                  }
         
                  .button {
                     width: 100% !important;
                     display: block !important;
                     padding: 0 !important;
                  }
         
                  .hide-on-mobile {
                     display: none;
                  }
               }
            }
         </style>
           
            <div class="description-hidden" style="
                 color: transparent;
                 display: none;
                 font-size: 0;
                 height: 0;
                 opacity: 0;
                 visibility: hidden;
                 width: 0;
               ">
               Make your designs interactive in minutes, without code. Collaborate in
               real-time, leave comments and share your prototypes with stakeholders.
            </div>
            <div class="description-spacer" style="display: none; max-height: 0px; overflow: hidden;">
               &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;‌&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
            </div>
            <div dir="ltr">
               <table aria-label="Email from Framer" border="0" cellpadding="0" cellspacing="0" role="presentation"
                  class="container centered marketing" align="center" width="600" style="
                   max-width: 680px;
                   padding: 40px;
                   padding-bottom: 40px;
                   padding-top: 40px;
                   width: 680px;
                 ">
         
                  <tr>
                     <td style="padding-bottom: 20px;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin: 0px auto;"
                           align="center">
                           <tbody>
                              <tr>
                                 <td>
                                    <a href="#"
                                       style="
                                 font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                                   sans-serif !important;
                               "><img src="https://static.framer.com/emails/logos/logo-circle-large.png" alt="Main Logo"
                                          border="0" width="50" height="50" id="mainlogo" /></a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
         
                  <tr>
                     <td class="headline-1" style="
                       font-size: 48px;
                       font-weight: 700;
                       letter-spacing: -0.03em;
                       line-height: 1.2;
                       margin: 0;
                       padding: 0;
                       padding-bottom: 0px;
                       padding-top: 0px;
                     ">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                           style="margin: 0px auto; text-align: center;" align="center">
                           <tbody>
                              <tr>
                                 <td>
                                    <h3 class="headline-1" style="
                                 font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                                   sans-serif !important;
                                 font-size: 48px;
                                 font-weight: 700;
                                 letter-spacing: -0.03em;
                                 line-height: 1.2;
                                 margin: 0;
                                 max-width: 500px;
                                 padding: 0;
                                 id="mail-title-chnge"
                               ">
                                       Your Framer Web invite is&nbsp;here
                                    </h3>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
         
                  <tr>
                     <td class="image" style="margin: 0px auto; padding: 40px 0; text-align: center;">
         
                        <a 
                           href="#"
                           style="
                         font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                           sans-serif !important;
                       "></a>
         
                       
                     </td>
                  </tr>
                  <tr>
                     <td class="content" style="padding-left: 40px; padding-right: 40px;">
         
                      
                        <p style="
                         -webkit-font-smoothing: antialiased;
                         font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                           sans-serif !important;
                         font-size: 18px;
                         letter-spacing: -0.1 !important;
                         line-height: 1.6 !important;
                         margin: 0px !important;
                         mso-line-height-rule: exactly;
                         text-rendering: optimizeLegibility;
                       "
                       id="mail-msg-chnage"
                       >
                           Framer Web is a new prototyping tool for teams to make designs
                           interactive in minutes, without code. Collaborate in real-time,
                           leave comments and share your prototypes with stakeholders using a
                           simple&nbsp;link.
                        </p>
                        <div class="space-20" style="height: 20px;">&nbsp;</div>
                        <ul class="list" style="
                         -webkit-font-smoothing: antialiased;
                         font-size: 16px;
                         line-height: 1.6 !important;
                         margin: 0px !important;
                         mso-line-height-rule: exactly;
                         padding: 0;
                         padding-left: 16px;
                         text-rendering: optimizeLegibility;
                       "
                       id="main-ul">
                           <li style="
                           font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                             sans-serif !important;
                           font-size: 18px;
                           letter-spacing: -0.1 !important;
                           line-height: 1.6 !important;
                           margin-bottom: 8px;
                           margin-top: 8px;
                         "
                         id="noteinp-chng1"
                         >
                            Import your work straight from Figma or Sketch to make it interactive.
                           </li>
                           <li style="
                           font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                             sans-serif !important;
                           font-size: 18px;
                           letter-spacing: -0.1 !important;
                           line-height: 1.6 !important;
                           margin-bottom: 8px;
                           margin-top: 8px;
                         " id="noteinp-chng2"
                         >
                              Build beautiful transitions between screens with Magic Motion.
                           </li>
                           
                        </ul>
                        <div class="wrapper-button big" style="margin-top: 40px !important;" id="website-link-to-add">
         
                           <a class="button big"
                              href="#"
                              style="
                           -webkit-text-size-adjust: none;
                           background-color: #0099ff;
                           border-radius: 14px;
                           color: #ffffff;
                           display: inline-block;
                           font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                             sans-serif !important;
                           font-size: 18px;
                           font-weight: 600;
                           letter-spacing: 0.2;
                           line-height: 40px;
                           padding: 7px 20px;
                           text-align: center;
                           text-decoration: none;
                           transition: background-color 0.2s;
                         "
                         target="_blank"
                         id="weblink-chng"
                         >Try it out</a>
         
                         
                        </div>
         
                        
                        
                        <div class="footer tight" style="margin-top: 40px;">
                           <p style="
                           -webkit-font-smoothing: antialiased;
                           color: #aaaaaa;
                           font-family: "Inter", "Helvetica Neue", Helvetica, Arial,
                             sans-serif !important;
                           font-size: 14px !important;
                           letter-spacing: -0.1 !important;
                           line-height: 1.6 !important;
                           margin: 0px !important;
                           mso-cellspacing: 0px;
                           mso-line-height-rule: exactly;
                           mso-padding-alt: 0px;
                           text-rendering: optimizeLegibility;
                         ">
                              &copy; 2020 
                              <span id="company-name-chng">Your Company Name</span>
                           </p>
                        </div>
                        <div class="space-20" style="height: 20px;">&nbsp;</div>
         
                     </td>
                  </tr>
               </table>
            </div>

        </div>
    <?php include 'alljs.php'; ?>

    <script>
        $(document).ready(function () {
            getMailTemp();
            var noteInpTrack = 2;
            var wadd = $('#website-add');
            var wrem = $('#website-remove');
            wadd.hide();
            $('#add').click(function (e) { 
               e.preventDefault();
               noteInpTrack++;
               let ele = '';
               ele += '<div>';
               ele += '<div class="md-form md-outline">';
               ele += '<input type="text" id="noteinp'+ noteInpTrack +'"';
               ele += 'data-id="'+ noteInpTrack +'"';
               ele += 'class="form-control noteInput">';
               ele += '<label id="label'+ noteInpTrack +'">Note '+ noteInpTrack +'</label>';
               ele += '</div>';
               ele += '</div>';

               var ele2 = '';
               ele2 += '<li style="';
               ele2 += 'font-family: "Inter", "Helvetica Neue", Helvetica, Arial,';
               ele2 += 'sans-serif !important;';
               ele2 += 'font-size: 18px;';
               ele2 += 'letter-spacing: -0.1 !important;';
               ele2 += 'line-height: 1.6 !important;';
               ele2 += 'margin-bottom: 8px;';
               ele2 += 'margin-top: 8px;';
               ele2 += '" id="noteinp-chng'+ noteInpTrack +'"';
               ele2 += '>';
               ele2 += '</li>';
               // const ele = '<input id="noteinp'+ noteInpTrack +'" value="'+ noteInpTrack +'">';
               $('#note-input-elm').append(ele);
               $('#main-ul').append(ele2);
            });
            $('#remove').click(function (e) { 
               e.preventDefault();
               if (noteInpTrack > 0) {
                  $('#noteinp' + noteInpTrack).remove();
                  $('#label' + noteInpTrack).remove();
                  $('#noteinp-chng' + noteInpTrack).remove();
                  noteInpTrack--;
               }
            });
            $(document).on('keyup', '.noteInput', function () {
               // console.log($('#noteinp' + $(this).data().id).val());
               $('#noteinp-chng' + $(this).data().id).text($('#noteinp' + $(this).data().id).val());
            });
            function getMailTemp() {
               /* $('#lidemo').css('font-family', '"Inter", "Helvetica Neue", Helvetica, Arial, sans-serif !important');
               $('#lidemo').css('font-size', '18px');
               $('#lidemo').css('letter-spacing', '-0.1 !important');
               $('#lidemo').css('line-height', '1.6 !important');
               $('#lidemo').css('margin-bottom', '8px');


               $('#lidemo').css('margin-top', '8px'); */
               $('#lidemo').css({"font-family": "'Inter', 'Helvetica Neue', Helvetica, Arial, sans-serif !important",
                           "font-size": "18px",
                           "letter-spacing": "-0.1 !important",
                           "line-height": "1.6 !important",
                           "margin-bottom": "8px",
                           "margin-top": "8px"});


               /* $.ajax({
                    type: "POST",
                    url: "../ajax/mail1",
                    data: { type: 'basic' },
                    success: function (response) {
                    }
               }); */
            }

          
            $('#uploadLogo').change(function (e) { 
                e.preventDefault();
                            
                var input = e.target;

                /* var reader = new FileReader();
                reader.onload = function(){
                    var dataURL = reader.result;
                    var output = document.getElementById('uploadedLogo');
                    output.src = dataURL;
                };
                reader.readAsDataURL(input.files[0]); */
                // console.log(document.getElementById('uploadedLogo').src);
                
               var reader = new FileReader();
               reader.onload = function() {
                  var dataURL = reader.result;
                  var output = document.getElementById('mainlogo');
                  output.src = dataURL;
               };
               reader.readAsDataURL(input.files[0]); 
            });
            $('#mail-title').keyup(function (e) { 
               e.preventDefault();
               // console.log($(this).val());
               $('#mail-title-chnge').text($(this).val());
               // console.log('blur');
            });
            $('#mail-msg').keyup(function (e) { 
               e.preventDefault();
               $('#mail-msg-chnage').text($(this).val());
            });
            $('#website-link').keyup(function (e) { 
               $('#weblink-chng').attr('href', $(this).val());
            });
            
            $(wadd).click(function (e) { 
               e.preventDefault();
               var webAdd = '';
               webAdd += '<a class="button big"';
               webAdd += 'href="#"';
               webAdd += 'style="';
               webAdd += '-webkit-text-size-adjust: none;';
               webAdd += 'background-color: #0099ff;';
               webAdd += 'border-radius: 14px;';
               webAdd += 'color: #ffffff;';
               webAdd += 'display: inline-block;';
               webAdd += 'font-family: "Inter", "Helvetica Neue", Helvetica, Arial,';
               webAdd += 'sans-serif !important;';
               webAdd += 'font-size: 18px;';
               webAdd += 'font-weight: 600;';
               webAdd += 'letter-spacing: 0.2;';
               webAdd += 'line-height: 40px;';
               webAdd += 'padding: 7px 20px;';
               webAdd += 'text-align: center;';
               webAdd += 'text-decoration: none;';
               webAdd += 'transition: background-color 0.2s;"';
               webAdd += 'target="_blank"';
               webAdd += 'id="weblink-chng"';
               webAdd += '>Try it out</a>';
               $('#website-link-to-add').append(webAdd);
               $('#weblink-chng').attr('href', $('#website-link').val());
               wadd.hide();
               wrem.show();
            });
            $(wrem).click(function (e) { 
               e.preventDefault();
               $('#website-link').val('')
               $('#weblink-chng').remove();
               wrem.hide();
               wadd.show();
            });
            $('#company-name').keyup(function (e) { 
               $('#company-name-chng').text($(this).val());
            });
            $('#next-btn').click(function (e) { 
               e.preventDefault();

               var companyName = '';
               var mailTitle = '';
               var mailMsg = '';
               var webLink = null;
               var noteInPass = [];

               if (!$('#website-remove').is(":hidden")) {
                  webLink = $('#website-link').val();
               }
               companyName = $('#company-name').val();
               mailTitle = $('#mail-title').val();
               mailMsg = $('#mail-msg').val();

               if (companyName === '') {
                  alert('Please Enter Company Name');
                  return;
               }

               if (mailTitle === '') {
                  alert('Please Enter Mail Title');
                  return;
               }

               for (let index = 1; index <= noteInpTrack; index++) {
                  noteInPass.push($('#noteinp' + index).val());
               }
               if (noteInPass.length <= 0) {
                  noteInPass = null;
               }

               $.ajax({
                  type: "POST",
                  url: "../ajax/templatevar",
                  data: { t1: companyName, t2: mailTitle, t3: mailMsg, t4: webLink, t5: noteInPass},
                  success: function (response) {
                     
                     if (document.getElementById("uploadLogo").files[0] !== undefined) {
                        var name = document.getElementById("uploadLogo").files[0].name;
                        var fd = new FormData();
                        var ext = name.split('.').pop().toLowerCase();

                        if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1) 
                        {
                           $('#uploadLogo').val('');
                           alert("You Must Have to upload (jpg,jpeg,png)");
                           return;
                        }

                        fd.append("Mail_Logo", document.getElementById('uploadLogo').files[0]);

                        $.ajax({
                           type: "POST",
                           url: "../ajax/uploadMailLogo",
                           data: fd,
                           contentType: false,
                           cache: false,
                           processData: false,
                           success: function (data) {
                              if (data === 'sUcC') {
                                 location.href = 'sendmail?fromtemp=1';
                              }
                           }
                        });
                     } else {
                        $.ajax({
                           type: "POST",
                           url: "../ajax/setNullMailLogo",
                           data: {mlogo: 'NullLogo'},
                           success: function (response) {
                              if (response === 'sUcC') {
                                 location.href = 'sendmail?fromtemp=1';
                              }
                           }
                        });
                     }
                  }
               });
            });
        });
    </script>
</body>
</html>