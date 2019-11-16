@extends('layouts.master')

@section('content')
<?php 
$slides = $data['slides'];
if($data['Headslides']){$Headslides = $data['Headslides']; }
?>
<section>
            <div id="carouselControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                     <?php $i=0; ?>
                    @foreach($slides as $slide)
                    <?php if($i==1){ $class ="active";}else $class="";?>
                      <div class="carousel-item <?php echo $class;?>">

                      <img src="{{URL('/')}}/local/public/slides/{{$slide->path}}"  alt="" class="d-block w-100">
                    </div>
                    <?php $i++;?>
                     @endforeach
                   <!-- <div class="carousel-item active">
                      <img src="{{URL('/')}}/assets/images/thirumals.jpg"  alt="" class="d-block w-100">
                    </div>
                   <div class="carousel-item">
                      <img src="{{URL('/')}}/assets/images/thirupathi1.jpg"  alt="" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                      <img src="{{URL('/')}}/assets/images/thirupathi2.jpg"  alt="" class="d-block w-100">
                    </div> 
                     <div class="carousel-item">
                      <img src="{{URL('/')}}/assets/images/thirupathi3.jpg"  alt="" class="d-block w-100">
                    </div>-->
                </div>
                <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <!-- Body Section -->
        <div class="container-fluid">
            <div class="page-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="border-12">
                                            <img src="{{URL('/')}}/assets/images/yv2.jpg" alt="" class="chairmain-img">
                                            <div class="text-center bg-grey">
                                                <h4 class="pt-2">Y. V. Subba Reddy</h4>
                                                <span><i>TTD Chairman</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="height: 464px;">
                                        <div class="border-12 m-0">
                                            <div class="bg-update b-bottom">
                                                <span class="chairmain-title">Updated Videos</span>
                                            </div>
                                            <iframe width="380" height="190" src="https://www.youtube.com/embed/3_JxprA4VPE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="ml-2 mt-2"></iframe>
                                            <iframe width="380" height="190" src="https://www.youtube.com/embed/aHICLHcfge8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="ml-2 mt-2"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="border-12">
                                            <div class="bg-update b-bottom">
                                                <span class="chairmain-title">Updated News & Events</span>
                                            </div>
                                            <div class="">
                                                <marquee behavior="scroll"  direction="up" scrollamount="2" onMouseOver="this.stop()" onMouseOut="this.start()">
                                                    <p class="ml-2 b-bottom"><a href="https://www.tirumala.org/Documents/201908161119102774.pdf" target="_blank">Salakatla Brahmotsavam in Sri Venkateswara Swamyvari Temple</a></p>
                                                    <p class="ml-2 b-bottom"><a href="#" target="_blank">In View Of Srivari Utlotsavam on 24.08.2019(Saturday), Arjitha Sevas such as Brahmotsavam,</a></p>
                                                    <p class="ml-2 b-bottom"><a href="https://www.tirumala.org/Documents/201907311047015478.jpg" target="_blank">TTD -VQC,Tirumala - Providing of privilaged Darshan to the Physically Challenged </a></p>
                                                    <p class="ml-2 b-bottom"><a href="https://www.tirumala.org/Documents/201907261106181532.pdf" target="_blank">TTD - HDPP- Tirupati - NAGARA SANKEERTHANA BHAJANA ALLOTMENT..</a></p>
                                                    <p class="ml-2 b-bottom"><a href="https://www.tirumala.org/Documents/201906201327593701.pdf" target="_blank">TTD - Dasa Sahithya Project, TTD Final Auditions results </a></p>
                                                    <p class="ml-2 b-bottom"><a href="https://www.tirumala.org/Documents/201906181520460332.pdf" target="_blank">Akanda Hari Nama Sankeerthana Program allotment from July to September 2019.</a></p>
                                                    <p class="ml-2 b-bottom"><a href="https://www.tirumala.org/Documents/201906041648148190.pdf" target="_blank">Education Department, Special Education - filling up the vacant post of (4) instructor, SVTCH through contract basis for the academic year 2019-20201  </a></p>
                                                </marquee>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="ml-4 text-center">Registration</h3>
                                <form class="mt-40">
                                    <div class="form-group row">
                                        <div class="col-md-3 text-align-right">
                                            Name <span class="style1">&nbsp;*</span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="name" class="form-control" placeholder="Enter name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <div class="col-md-3 text-align-right">
                                            Email <span class="style1">&nbsp;*</span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="email" name="name" class="form-control" placeholder="Enter Email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <div class="col-md-3 text-align-right">
                                            Mobile <span class="style1">&nbsp;*</span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="mobile" name="name" class="form-control" placeholder="Enter Mobile Number" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <div class="col-md-3 text-align-right">
                                            Reference 
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control">
                                                <option>MLA</option>
                                                <option>MP</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <div class="col-md-3 text-align-right">
                                            Ref Name
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="name" class="form-control" placeholder="Enter name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <div class="col-md-3">&nbsp;</div>
                                        <div class="col-md-9"> 
                                            <input id="input-submit" value="Submit" type="submit" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
@endsection