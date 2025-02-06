<!DOCTYPE html>
<html>
    <head>
        <title>Contact Form Submission</title>
        <style>
            body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fc;
            margin: 0;
            padding: 0;
            }
            table {
            width: 100%;
            padding: 30px;
            }
            .email-container {
            width: 600px;
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            }
            .email-header {
            background-color: #FFA500;
            border-radius: 15px 15px 0 0;
            padding: 20px;
            text-align: center;
            }
            .email-header img {
            width: 100px;
            height: auto;
            }
            .email-header h1 {
            font-size: 22px;
            color: #ffffff;
            margin: 0;
            font-weight: 700;
            }
            .email-content {
            padding: 20px;
            color: #4a4a4a;
            font-size: 16px;
            line-height: 1.8;
            }
            table th {
            text-align: left;
            font-weight: bold;
            padding: 10px;
            border-bottom: 1px solid #eaeaea;
            }
            table td {
            padding: 10px;
            border-bottom: 1px solid #eaeaea;
            }
            .footer {
            background-color: #f8f9fc;
            text-align: center;
            padding: 20px;
            border-top: 1px solid #eaeaea;
            border-radius: 0 0 15px 15px;
            }
            .footer p {
            font-size: 14px;
            color: #6c757d;
            }
            .footer a {
            color: #FFA500;
            font-weight: bold;
            text-decoration: none;
            margin-right: 10px;
            }
        </style>
    </head>
    <body>
      <table>
         <tr>
            <td align="center">
               <div class="email-container">
                  <!-- Header Section -->
                  <div class="email-header">
                     <h1 class="display-5 m-0 text-primary">Safe - <span class="text-secondary">Cam</span></h1>
                  </div>
                  <!-- Message Section -->
                  <div class="email-content">
                     <h2>Contact Us</h2>
                     <p>Thank you for reaching out to contact us. Below are the details of the message:</p>
                     <table width="100%">
                        <tr>
                           <th>Name</th>
                           <td>{{ $MailData['name'] }}</td>
                        </tr>
                        <tr>
                           <th>Email</th>
                           <td>{{ $MailData['email'] }}</td>
                        </tr>
                        <tr>
                           <th>Subject</th>
                           <td>{{ $MailData['subject'] }}</td>
                        </tr>
                        <tr>
                           <th>Message</th>
                           <td>{{ $MailData['message'] }}</td>
                        </tr>
                     </table>
                  </div>
                  <!-- Footer Section -->
                  <div class="footer">
                     <p>Thank you for contacting us!</p>
                     <a href="http://localhost/safe-cam/about" target="_blank">Visit Our Website</a>
                     <a href="http://localhost/safe-cam/contact" target="_blank">Contact Us</a>
                  </div>
               </div>
            </td>
         </tr>
      </table>
    </body>
</html>