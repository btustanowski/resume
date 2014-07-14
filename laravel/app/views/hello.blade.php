@extends('components.meta')

@section('mastercontent')

<div class="row" id="top">
    <div id="nav" class="col-md-3 crouch">
        <ul class="nav nav-list">
            <li><a href="#top">About me</a></li>
            <li><a href="#personal">Personal Information</a></li>
            <li><a href="#experience">Experience</a></li>
            <li><a href="#education">Education</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#interests">Interests</a></li>
            <li><a href="#samples">Code Samples</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div>
    <div id="content" class="col-md-9 col-md-offset-3 crouch">
        <h1>[[ $conf['top_name'] ]]</h1>
        <h3>[[ $conf['top_title'] ]]</h3>

        <section class="panel panel-default">
            <div class="panel-body">
                [[ $conf['top_note'] ]]
            </div>
        </section>

        <section id="personal">
            <h2>Personal Information</h2>
            <ul>
                @foreach ($personal as $row)
                <li>
                    <em>[[ $row->entry ]]</em><span>[[ $row->content ]]</span>
                </li>
                @endforeach
            </ul>
        </section>

        <section id="experience">
            <h2>Experience</h2>
            @foreach ($experience as $row)
            <h4>[[ $row->title ]]</h4>
            <h5><span class="fa fa-calendar"></span> [[ $row->from ]] – [[ $row->to ]]</h5>
            <p>[[ $row->description ]]</p>
            <hr>
            @endforeach
        </section>

        <section id="education">
            <h2>Education</h2>
            @foreach ($education as $row)
            <h4>[[ $row->title ]]</h4>
            <h5><span class="fa fa-calendar"></span> [[ $row->from ]] – [[ $row->to ]]</h5>
            <p>[[ $row->description ]]</p>
            <hr>
            @endforeach
        </section>

        <section id="skills">
            <h2>Skills and Technologies</h2>
            <ul>
                @foreach ($skills as $row)
                <li>[[ $row->name ]]</li>
                @endforeach
            </ul>
        </section>

        <section id="interests">
            <h2>Interests</h2>
            <p>
                @foreach ($interests as $row)
                [[ $row->name ]]<span>, </span>
                @endforeach
            </p>
        </section>

        <section id="samples">
            <h2>Code Samples</h2>
            @foreach ($samples as $row)
            <section class="panel panel-default">
                <div class="panel-body">
                    <h3>[[ $row->title ]]</h3>
                    <h4 class="pull-right">[[ $row->language ]]</h4>
                    <p>[[ $row->description ]]</p>
                    <hr>
                    <pre><code>[[ $row->content ]]</code></pre>
                </div>
            </section>
            @endforeach
        </section>

        <section id="contact">
            <h2>Contact Me</h2>
            <ul>
                <li>
                    <em>E-mail</em><span>b.tustanowski@gmail.com</span>
                </li>
                <li>
                    <em>Skype</em><span>b.tustanowski</span>
                </li>
                <li>
                    <em>Phone</em><span>+48 886 992 991</span>
                </li>
            </ul>
        </section>
    </div>
    <div class="clearfix"></div>
    <footer>
        &copy; b.tustanowski
    </footer>
</div>

@stop