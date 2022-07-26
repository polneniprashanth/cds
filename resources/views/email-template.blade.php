<!DOCTYPE html>
<html style="background-color:#ffffff;border-radius: 10px;border: 2px solid black;">
    <head>
        <title> Email Template in Laravel </title>
    </head>
    <body style="border-radius: 10px;">
        
        <div style="margin-left:100px;margin-top:50px;font-size:20px;font-weight:500;font-family:Inter;background-color:#F5F7FA;color:black;padding:50px;width:600px">
            <div>Hi {{ $data->stud_name }},</div>
            <div style="margin-top: 10px;">
                Congratulations! You’ve successfully completed {{ $data->course_name }}. 
                We The Skill Craft are pleased to issue your official {{ $data->course_name }} Certificate.
            </div>
            <a style="background-color: #2A73CC;color: #ffffff;display: inline-block;font-size: 20px;border:none; border-radius:10px;padding:15px;margin-left: 150px;margin-top: 10px;" href="http://127.0.0.1:8000/certificate/verify/{{$data->cert_id}}">View Certificate</a>
            <p style="margin-top: 10px;">Now that you’ve earned your Certificate, why not share it with your network?</p>
            <p>Ways to share:</p>
            <ol>
                <li>Add your {{ $data->course_name }} Certificate directly to your LinkedIn profile</li>
                <li>Download PDF to print or share</li>
                <li>Share on social media and your LinkedIn Feed</li>
            </ol>
            <p>Keep it Up!,</p>
            <p>The Skill Craft</p>
        </div>
        
    </body>