@extends('components.meta')

@section('mastercontent')

<div class="row" id="top">
    <ul class="nav nav-list affix col-md-2" id="nav">
        <li><a href="#top">About me</a></li>
        <li><a href="#personal">Personal Information</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#education">Education</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#samples">Code Samples</a></li>
        <li><a href="#interests">Interests</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <div id="content" class="col-md-9 col-md-offset-3">

        <h1>Błażej Tustanowski</h1>
        <h3>Webdeveloper, UX Designer</h3>

        <section class="panel panel-default">
            <div class="panel-body">
                A webdeveloper with a passion for User Experience and functionality. Fast thinker and learner with deep understanding of both front- and back-end sides of website creation. Strong sense of design and ambition, always eager to learn new technologies and develop new solutions.
            </div>
        </section>

        <section id="personal">
            <h2>Personal Information</h2>
            <ul>
                <li>
                    <em>name</em><span>Robb Armstrong</span>
                </li>
                <li>
                    <em>name</em><span>Robb Armstrong</span>
                </li>
                <li>
                    <em>name</em><span>Robb Armstrong</span>
                </li>
                <li>
                    <em>name</em><span>Robb Armstrong</span>
                </li>
                <li>
                    <em>name</em><span>Robb Armstrong</span>
                </li>
                <li>
                    <em>name</em><span>Robb Armstrong</span>
                </li>
            </ul>
        </section>

        <section id="experience">
            <h2>Professional Experience</h2>
            <h4>First Beat Media</h4>
            <h5><span class="fa fa-calendar"></span> 2011 - current</h5>
            <p>wqerwqer</p>
            <hr>
            <h4>First Beat Media</h4>
            <h5><span class="fa fa-calendar"></span> 2011 - current</h5>
            <p>wqerwqer</p>
        </section>

        <section id="education">
            <h2>Education</h2>
            <h4>Opole Blabla</h4>
            <h5><span class="fa fa-calendar"></span> 2010 - 2013</h5>
            <p>wqerwqer</p>
        </section>

        <section id="skills">
            <h2>Skills and Technologies</h2>
            <ul>
                <li>PHP</li>
                <li>Javascript</li>
                <li>PHP</li>
                <li>Javascript</li>
                <li>Redis</li>
                <li>jQuery</li>
                <li>PHP</li>
                <li>Javascript</li>
                <li>PHP</li>
                <li>Javascript</li>
                <li>Redis</li>
                <li>jQuery</li>
            </ul>
        </section>

        <section id="samples">
            <h2>Code Samples</h2>


            <section class="panel panel-default">
                <div class="panel-body">
                    <h3>Laravel User Controller</h3>
                    <h4 class="pull-right">PHP, ActiveRecord</h4>
                    <p>Example of a Laravel Controller</p>
                    <hr>

<pre><code>
require_once 'Zend/Uri/Http.php';

namespace Location\Web;

interface Factory
{
    static function _factory();
}
</code></pre>

                </div>
            </section>



        </section>

        <section id="interests">
            <h2>Interests</h2>
            <p>
                Diving, driving, skiing
            </p>
        </section>

        <section id="contact">
            <h2>Contact Me</h2>
            <ul>
                <li>
                    <em>e-mail</em><span>b.tustanowski@gmail.com</span>
                </li>
                <li>
                    <em>skype</em><span>b.tustanowski</span>
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