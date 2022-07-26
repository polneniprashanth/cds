@extends('layouts.welcome')
@section('content2')
    <div class="wrapper">
        <div class="one">
            <div style="font-family: Inter;font-size: 34px; padding-top: 50px;">
                Completed by <strong>{{$certificate->stud_name}}</strong>
            </div>
            <div style="font-family: Inter;padding-top: 15px;">
                <strong>Grade acheived: {{$certificate->score}}</strong>
            </div>
            <div style="overflow: hidden;font-family: Inter; font-size: 19px; padding-right: 20px; padding-top: 30px ;">
                {{$certificate->stud_name}}'s account is verified. THE SKILL CARFT certifies their successful completion of <u style="color: black;">{{$certificate->course_name}}</u>
            </div>
        </div>
        <div class="two">
            <iframe
                src="/certificates/{{ $certificate->certificate }}"
                frameBorder="0"
                scrolling="auto"
                height="100%"
                width="100%"
            ></iframe>
        </div>
        <div class="three">
            <div style="margin-left:10px;font-family: Inter; font-size: 28px; color: black ;"><u>{{$certificate->course_name}}</u></div>
            <div style="margin-left:10px;font-family:Inter">
                {!! $course->course_details !!};
            </div>
        </div>
        <div  class="four">
            <div class="skills" >SKILLS YOU WILL GAIN </div>
            <div style="margin-top:15px;" class="d-flex">
                <div style="margin-left:10px;" class="skill">Distributed Computing</div>
                <div style="position:absolute;left:300px;" class="skill">Computer Architecture</div>
            </div>
            <div style="margin-top:30px;" class="d-flex">
                <div style="margin-left:10px;" class="skill">Openmp</div>
                <div style="position:absolute;left:300px;" class="skill">Parallel Computing</div>
            </div>
            <style>
                .skills{
                    padding: 10px;
                    font-family: Inter;
                    font-size:20px;
                    letter-spacing:-2px;
                    color: black;
                }
                .skill{
                    padding:5px;
                    background-color: #EBECED;
                    color:black;
                    border-radius:5px;
                }
            </style>
        </div>
        <div class="five">
            <h1 class="adjust">
                <!-- Button trigger modal -->
                <button type="button" class="button button1" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                    Share Certificate
                </button>
                <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div style="margin-left:100px;margin-top:250px;width:450px;" class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ __('Share Your Certificate') }}</h4>                   
                            </div>
                            <div style="margin-top:20px;margin-left:50px;margin-bottom:20px;" class="modal-body">   
                                <div class="d-flex">
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=http://127.0.0.1:8000/certificate/verify/{{ $certificate->cert_id }}">
                                        <img style="height:50px;width:50px;border-radius:100%" id="in" src="/public/in.png" srcset="/in.png 1x">
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=http://127.0.0.1:8000/certificate/verify/{{ $certificate->cert_id }}&text=I completed {{$certificate->course_name}}! Check out my certificate">
                                    <img style="margin-left:20px;height:50px;width:50px;border-radius:100%" id="twitter" src="/public/twitter.png" srcset="/twitter.png 1x">
                                    </a>
                                    <img style="margin-left:20px;height:50px;width:50px;border-radius:100%" id="wp" src="/public/wp.png" srcset="/wp.png 1x" onclick="openWhatsApp()">

                                    <a href="https://t.me/share/url?url={http://127.0.0.1:8000/certificate/verify/{{ $certificate->cert_id }}}&text={Hey friends! Check this course I have completed at The Skill Craft.}">
                                        <img style="margin-left:20px;height:50px;width:50px;border-radius:100%" id="tg" src="/public/tg.png" srcset="/tg.png 1x">
                                    </a>  
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://127.0.0.1:8000/certificate/verify/{{ $certificate->cert_id }}">
                                        <img style="margin-left:20px;height:50px;width:50px;border-radius:100%" id="fb" src="/public/fb.png" srcset="/fb.png 1x">
                                    </a>                                 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <script> 
                    function openWhatsApp() {  
                        window.open('whatsapp://send?text= http://127.0.0.1:8000/certificate/verify/{{ $certificate->cert_id }}');  
                    }  
                </script> 
                <a href="{{ route('download', ['certificate'=>$certificate->cert_id]) }}" class="button2">
                    Download Cerficate
                </a>
            </h1>

            <style>
                .button {
                    background-color: #5844ee; /* Green */
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                    -webkit-transition-duration: 0.4s; /* Safari */
                    transition-duration: 0.4s;
                }
                .button1:hover{
                    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                }
                .button2{
                    border: 1px solid  #591ad6;
                    color: rgb(48, 54, 218);
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                    -webkit-transition-duration: 0.4s; /* Safari */
                    transition-duration: 0.4s;
                }
                .adjust{
                    padding-left: 150px;
                    padding-top: 40px;
                }
            </style>
        </div>
    </div>
    <style>
        .wrapper {
            padding-top: 20px;
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 10px;
            grid-auto-rows: 180px;
            
            grid-template-areas:
                "a a a a b b b b"
                "a a a a b b b b"
                "c c c c b b b b"
                "d d d d e e e e";
            }
            .one {
                overflow: hidden;
                background-color: rgb(199, 236, 241);
                margin-left:20px;
                padding-left:10px;
                margin-right: 20px;
                margin-bottom: 30px;
                grid-area: a;
            }
            .two {
                grid-area: b;
            }
            .three {
                margin-left:20px;
                grid-area: c;
            }
            .four {
                marginn-top:20px;
                margin-left:20px;
                margin-right: 20px;
                border: 1px solid black;
                grid-area: d;
            }
            .five {
                grid-area: e;
            }
    </style>
@endsection