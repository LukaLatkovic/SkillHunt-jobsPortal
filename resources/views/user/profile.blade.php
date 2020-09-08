@extends('layout.app')

@section('select2css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');"
  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-start">
      <div class="col-md-12 ftco-animate text-center mb-5">
        <h1 class="mb-3 bread">Profile - {{$user->name}}</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 my-5">
        @include('flash-message')
        <div class="row mb-3">
          {{-- Photo --}}
          <div class="col-md-4 text-center">
            @if(!empty($profile->photo))
            <img class="p-0 profilepicture " src="{{asset('storage/images/'.$profile->photo) }}" 
            {{-- rounded-circle --}}
              data-toggle="modal" data-target="#uploadphoto{{$user->id}}">
            @else
            <i class="fas fa-user-circle fa-9x text-muted" data-toggle="modal"
              data-target="#uploadphoto{{$user->id}}"></i>
            @endif



            {{-- Upload Photo --}}
            <div class="modal fade" id="uploadphoto{{$user->id}}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <form action="/profile/uploadphoto" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                      <h5 class="modal-title text-info" id="exampleModalLabel">Upload Photo</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body editworksbody">
                      <div class="justify-content-center alert-info">
                        Image must be in format: jpeg,jpg,png. Size limit: 2 MB.
                      </div>
                      <br />
                      <div class="form-group">
                        <input type="file" class="form-control-file text-center" id="photo" name="photo"
                          aria-describedby="fileHelp">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            {{--End Upload Photo --}}
          </div>
          {{--End Photo --}}
          <div class="col-md-8 ">
            <h3 class="h3 text-info d-inline-block">{{$user->name}}</h3>
            @if(Auth::user()->id == $user->id)
            <a class="btn btn-default float-right" href="{{route ('editProfile')}}"><span class="text-info h6"><i
                  class="far fa-edit"></i>Edit</span></a>
            @endif
            {{-- @if ($profile !== null)
            <button class="btn btn-default float-right" data-toggle="modal" data-target="#editprofile{{$user->id}}"><i
              class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span></button>
            @else
            <button class="btn btn-default float-right" data-toggle="modal" data-target="#addprofile{{$user->id}}"><i
                class="far fa-edit text-success"></i> <span class="text-success h6">Add profile
                description</span></button>
            @endif --}}
            <h5 class="h5">
              @if ($profile !== null)
              {{$profile->job_title}}
              @endif

            </h5>

            @if ($profile !== null)
            <small class="h6 text-muted"><i class="fas fa-map-marker-alt"></i>&nbsp;
              @if($profile->province !== null){{$profile->province}},@endif
              @if($profile->city !== null) {{$profile->city}},@endif
              @if($profile->country !== null){{$profile->country}}@endif
              @endif
            </small>
          </div>
        </div>



        <div class="row mb-3">
          <div class="col-12">
            <h4 class="h5 text-info">
              @if($user->role == 2)
              Company overview
              @else
              Overview
              @endif
            </h4>
            <p>{!! $profile !== null ? $profile->overview : '' !!}</p>
          </div>
        </div>


        @if($user->role == 1)
        {{-- Nav tabs --}}
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
              aria-controls="pills-home" aria-selected="true">Skills</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
              aria-controls="pills-profile" aria-selected="false">Educational background</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
              aria-controls="pills-contact" aria-selected="false">Previous work</a>
          </li>
        </ul>
        @endif
        @if($user->role == 1)
        <div class="tab-content" id="pills-tabContent">

          {{-- ==========SKILLS=========== --}}
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card mb-12">
              {{-- <div class="card-header">
        <a class="card-title">
          <h5 class="d-inline-block h5 text font-weight-bold mb-0">Skills</h5>
          <button class="btn btn-default float-right py-0 px-1" data-toggle="modal"
            data-target="#editskills{{$user->id}}">
              <i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span>
              </button>
              <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal"
                data-target="#addskills{{$user->id}}">
                <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
              </button>
              </a>
            </div> --}}
            <div class="card-body">
              Skills
              @if(Auth::user()->id == $user->id)
              <button class="btn btn-default float-right py-0 px-1" data-toggle="modal"
                data-target="#editskills{{$user->id}}">
                <i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span>
              </button>
              <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal"
                data-target="#addskills{{$user->id}}">
                <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
              </button>
              @endif
              <br>
              <hr>

              @foreach($user->skills as $skill)
              <button type="button" class="btn btn-sm btn-info mt-1">{{$skill->skill}}</button>
              @endforeach
            </div>
          </div>
        </div>

        {{-- =========EDUCATION========== --}}
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="col-mb-12">
            {{-- <div class="card-header">
              <a class="card-title">
                <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Educational Background</h5>
                <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal"
                  data-target="#addeducation{{$user->id}}">
            <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
            </button>
            </a>
          </div> --}}
          <div class="card-body" style="background-color: white" id="educationBackgroundBody">
            Educational Background
            @if(Auth::user()->id == $user->id)
            <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal"
              data-target="#addeducation{{$user->id}}">
              <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
            </button>
            @endif
            <br>
            <hr>
            @foreach($educations as $education)
            <div>
              <p class="float-right text-danger targetEducDiv"><i class="far fa-trash-alt" data-toggle="modal"
                  data-target="#deleteEducation{{$education->id}}"></i></p>
              <p class="float-right text-info mr-4"><i class="fas fa-pencil-alt" data-id="{{$education->id}}"
                  data-toggle="modal" data-target="#editeducation{{$education->id}}"></i></p>
              <h5 class="h5 text-info">{{$education->course}}</h5>
              <h6 class="h6 text-black">School: {{$education->school}}</h6>
              <small class="h6 mb-2 text-monospace">Year: {{ $education->year }}</small>
              @if($education->achievement !== null)
              <div class="mt-3 text-black">Achievements: {!! $education->achievement !!}</div>
              @endif
              <hr>
            </div>
            <!-- Edit Educational Background Modal -->
            <div class="modal fade" id="editeducation{{$education->id}}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <form action="/profile/education/update" id="editEducation" method="post">
                {{ csrf_field() }}
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-info" id="exampleModalLabel">Edit Educational Background</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body addeducationbody">
                      <input type="hidden" value="{{$education->id}}" name="id">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i
                              class="fas fa-graduation-cap"></i>&nbsp;Department/Course</span>
                        </div>
                        <input type="text" id="editCourse" class="form-control" name="course"
                          value="{{$education->course}}">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-building"></i>&nbsp;School</span>
                        </div>
                        <input type="text" id="editSchool" class="form-control" name="school"
                          value="{{$education->school}}">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
                        </div>
                        <input type="text" id="editSchoolYear" class="form-control" name="year"
                          value="{{$education->year}}">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Achievement</span>
                        </div>
                        <textarea class="form-control" id="summary-ckeditor{{$education->id}}" name="achievement"
                          rows="1">{{$education !== null ? $education->achievement : ''}}</textarea>
                        <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                        <script>
                          CKEDITOR.replace( 'summary-ckeditor{{$education->id}}' );
                        </script>
                        {{-- <input type="text" id="editAchievement" class="form-control" name="achievement"
                    value="{{$education->achievement}}"> --}}
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary editEducation" data-id="{{$education->id}}">Save
                        changes</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>{{-- end modal --}}




            <!-- Delete Education Modal -->
            <div class="modal fade" id="deleteEducation{{$education->id}}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="/profile/education/delete" method="post">
                    {{ csrf_field() }}
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4>REMOVE EDUCATION</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" value="{{$education->id}}" name="id">
                      <h6 class="modal-title h6">Are you sure you want to delete <span
                          class="text-info">"{{$education->school}}"</span> from your profile?</h6>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-primary deleteEducation px-5"
                        data-id="{{$education->id}}">Yes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>






            @endforeach
            <!-- Add Educational Background Modal -->
            <div class="modal fade" id="addeducation{{$user->id}}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <form action="/profile/education/store" method="post" id="addEducation">
                {{ csrf_field() }}
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-info" id="exampleModalLabel">Add Educational Background</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body addeducationbody">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Course</span>
                        </div>
                        <input type="text" id="addCourse" class="form-control" name="course">
                        <span class="invalid-feedback" role="alert" id="courseError">
                          <strong></strong>
                         </span>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-building"></i>&nbsp;School</span>
                        </div>
                        <input type="text" id="addSchool" class="form-control" name="school">
                        <span class="invalid-feedback" role="alert" id="schoolError">
                          <strong></strong>
                        </span>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
                        </div>
                        <input type="text" id="addSchoolYear" class="form-control" name="year">
                        <span class="invalid-feedback" role="alert" id="yearError">
                          <strong></strong>
                        </span>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Achievements</span>
                        </div>
                        <textarea class="form-control" id="summary-ckeditor1" name="achievement" rows="1"></textarea>
                        <span class="invalid-feedback" role="alert" id="achievementError">
                          <strong></strong>
                        </span>
                        <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                        <script>
                          CKEDITOR.replace( 'summary-ckeditor1' );
                        </script>
                        {{-- <input type="text" id="addAchievement" class="form-control" name="achievement"> --}}
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="addNewEducation">Save
                        changes</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      {{-- ============WORK============ --}}
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="col-md-12">
          {{-- <div class="card-header">
            <a class="card-title">
              <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Work History</h5>
              @if(Auth::user()->id == $user->id)
              <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal"
                data-target="#addwork{{$user->id}}">
          <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
          </button>
          @endif
          </a>
        </div> --}}
        <div>
          <div class="card-body " style="background-color: white">
            Work History

            @if(Auth::user()->id == $user->id)
            <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal"
              data-target="#addwork{{$user->id}}">
              <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
            </button>
            @endif
            <br>
            <hr>
            @foreach($works as $work)
            <div>
              <p class="float-right text-danger targetWorkDiv">
                <i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteWork{{$work->id}}"></i>
              </p>
              <p class="float-right text-info mr-4">
                <i class="fas fa-pencil-alt" data-id="{{$work->id}}" data-toggle="modal"
                  data-target="#editWork{{$work->id}}"></i>
              </p>
              <h5 class="h5 text-info">{{$work->position}}</h5>
              <h6 class="h6 text-black">{{$work->company}}</h6>
              <small class="h6 mb-2 text-muted">{{ $work->year }}</small>
              <div class="mt-3 text-muted">{!! nl2br(e($work->description)) !!}</div>
              <hr>
            </div>

            <!-- Edit Work Background Modal -->
            <div class="modal fade" id="editWork{{$work->id}}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <form action="/profile/work/update" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-header">
                      <h5 class="modal-title text-info" id="exampleModalLabel">Edit Work Background</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body editworksbody">
                      <input type="hidden" name="id" value="{{$work->id}}">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i>&nbsp;Position</span>
                        </div>
                        <input type="text" id="editPosition" class="form-control" value="{{$work->position}}">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Company</span>
                        </div>
                        <input type="text" id="editCompany" class="form-control" value="{{$work->company}}">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
                        </div>
                        <input type="text" id="editWorkYear" class="form-control" value="{{$work->year}}">
                      </div>
                      <div class="form-group">
                        <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Description</span>
                        <textarea class="form-control" id="editWorkDescription"
                          rows="3">{{$work->description}}</textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary editWorkBackground" data-id="{{$work->id}}">Save
                        changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>


            <!-- Delete Work Modal -->
            <div class="modal fade" id="deleteWork{{$work->id}}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="/profile/work/delete" method="POST">
                    {{ csrf_field() }}
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4>REMOVE EMPLOYMENT</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="id" value="{{$work->id}}">
                      <h6 class="modal-title h6">Are you sure you want to delete <span
                          class="text-info">"{{$work->company}}"</span> from your profile?</h6>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-primary deleteWork px-5" data-id="{{$work->id}}">Yes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>


            @endforeach
          </div>
        </div>
      </div>

      <!-- Add Work History Modal -->
      <div class="modal fade" id="addwork{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <form action="/profile/work/store" method="POST">
              {{ csrf_field() }}
              <div class="modal-header">
                <h5 class="modal-title text-info" id="exampleModalLabel">Add New Work</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body editworksbody">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i>&nbsp;Position</span>
                  </div>
                  <input type="text" id="addPosition" class="form-control" name="position">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Company</span>
                  </div>
                  <input type="text" id="addCompany" class="form-control" name="company">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
                  </div>
                  <input type="text" id="addWorkYear" class="form-control" name="year">
                </div>
                <div class="form-group">
                  <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Description</span>
                  <textarea class="form-control" id="addWorkDescription" rows="3" name="description"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary addNewWorkButton">Save
                  changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  {{-- ============================================================================================= --}}
  {{-- <div class="card mb-12"> --}}
  <!-- Edit Skills Modal -->
  <div class="modal fade" id="editskills{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/profile/skills/edit" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Skills</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body editskillsbody">
            <select class="form-control selectedskills" multiple="multiple" placeholder="Select State" name="skills[]">
              <option selected></option>
              @foreach($skills as $skill)
              <option value="{{$skill->id}}">{{$skill->skill}}</option>
              @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- Add Skills Modal -->
  <div class="modal fade" id="addskills{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="/profile/skills/store" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Skill</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body addskillsbody">
            <div class="form-group col-xs-12">

              <select class="form-control col-md-12 select2" multiple="multiple" placeholder="Select State"
                name="skills[]">
                <option></option>
                @foreach($skills as $skill)
                <option value="{{$skill->id}}">{{$skill->skill}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('.select2').select2({
          width: 'resolve', 
          placeholder: "Please select Skills",
          allowClear: true
        });
        $('.selectedskills').select2().val({!! json_encode($user->skills()->allRelatedIds()) !!}).trigger('change');
    });
  </script>



  {{-- <div class="card-header">
          <a class="card-title">
            <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Educational Background</h5>
            <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal"
              data-target="#addeducation{{$user->id}}">
  <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
  </button>
  </a>
  </div>
  <div class="card-body" id="educationBackgroundBody">
    @foreach($educations as $education)
    <div>
      <p class="float-right text-danger targetEducDiv"><i class="far fa-trash-alt" data-toggle="modal"
          data-target="#deleteEducation{{$education->id}}"></i></p>
      <p class="float-right text-info mr-4"><i class="fas fa-pencil-alt" data-id="{{$education->id}}"
          data-toggle="modal" data-target="#editeducation{{$education->id}}"></i></p>
      <h5 class="h5 text-info">{{$education->course}}</h5>
      <h6 class="h6 text-black">{{$education->school}}</h6>
      <small class="h6 mb-2 text-muted">{{ $education->year }}</small>
      <div class="mt-3 text-info">{!! $education->achievement !!}</div>
      <hr>
    </div>
  </div> --}}

  <!-- Edit Educational Background Modal -->
  {{-- <div class="modal fade" id="editeducation{{$education->id}}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info" id="exampleModalLabel">Edit Educational Background</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body addeducationbody">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Course</span>
            </div>
            <input type="text" id="editCourse" class="form-control" name="course" value="{{$education->course}}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;School</span>
            </div>
            <input type="text" id="editSchool" class="form-control" name="school" value="{{$education->school}}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
            </div>
            <input type="text" id="editSchoolYear" class="form-control" name="year" value="{{$education->year}}">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Achievement</span>
            </div>
            <input type="text" id="editAchievement" class="form-control" name="achievement"
              value="{{$education->achievement}}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary editEducation" data-dismiss="modal"
            data-id="{{$education->id}}">Save changes</button>
        </div>
      </div>
    </div>
  </form>
  </div>end modal --}}




  <!-- Delete Education Modal -->
  {{-- <div class="modal fade" id="deleteEducation{{$education->id}}">
  <div class="modal-dialog">
    <div class="modal-content"> --}}

      <!-- Modal Header -->
      {{-- <div class="modal-header">
                  <h4>REMOVE EDUCATION</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <h6 class="modal-title h6">Are you sure you want to delete <span
                      class="text-info">"{{$education->school}}"</span> from your profile?</h6>
    </div> --}}
    <!-- Modal footer -->
    {{-- <div class="modal-footer">
                  <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                  <button type="button" class="btn btn-primary deleteEducation px-5" data-dismiss="modal"
                    data-id="{{$education->id}}">Yes</button>
  </div>

  </div>
  </div>
  </div>
  @endforeach --}}




  <!-- Add Educational Background Modal -->
  {{-- <div class="modal fade" id="addeducation{{$user->id}}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="/profile/education/store" method="post">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-info" id="exampleModalLabel">Add Educational Background</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body addeducationbody">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Course</span>
            </div>
            <input type="text" id="addCourse" class="form-control" name="course">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;School</span>
            </div>
            <input type="text" id="addSchool" class="form-control" name="school">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
            </div>
            <input type="text" id="addSchoolYear" class="form-control" name="year">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-trophy"></i>&nbsp;Achievement</span>
            </div>
            <input type="text" id="addAchievement" class="form-control" name="achievement">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-dismiss="modal" id="addNewEducation">Save
            changes</button>
        </div>
      </div>
    </div>
  </form>
  </div> --}}


  {{-- <div class="col-md-12">
        <div class="card-header">
          <a class="card-title">
            <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Work History</h5>
            <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal"
              data-target="#addwork{{$user->id}}">
  <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
  </button>
  </a>
  </div>
  <div>
    <div class="card-body workBackgroundBody">
      @foreach($works as $work)
      <div>
        <p class="float-right text-danger targetWorkDiv">
          <i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteWork{{$work->id}}"></i>
        </p>
        <p class="float-right text-info mr-4">
          <i class="fas fa-pencil-alt" data-id="{{$work->id}}" data-toggle="modal"
            data-target="#editWork{{$work->id}}"></i>
        </p>
        <h5 class="h5 text-info">{{$work->position}}</h5>
        <h6 class="h6 text-black">{{$work->company}}</h6>
        <small class="h6 mb-2 text-muted">{{ $work->year }}</small>
        <div class="mt-3 text-muted">{!! nl2br(e($work->description)) !!}</div>
        <hr>
      </div>

      <!-- Edit Work Background Modal -->
      <div class="modal fade" id="editWork{{$work->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-info" id="exampleModalLabel">Edit Work Background</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body editworksbody">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i>&nbsp;Position</span>
                </div>
                <input type="text" id="editPosition" class="form-control" value="{{$work->position}}">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Company</span>
                </div>
                <input type="text" id="editCompany" class="form-control" value="{{$work->company}}">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
                </div>
                <input type="text" id="editWorkYear" class="form-control" value="{{$work->year}}">
              </div>
              <div class="form-group">
                <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Description</span>
                <textarea class="form-control" id="editWorkDescription" rows="3">{{$work->description}}</textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary editWorkBackground" data-dismiss="modal"
                data-id="{{$work->id}}">Save changes</button>
            </div>
          </div>
        </div>
      </div> --}}


      <!-- Delete Work Modal -->
      {{-- <div class="modal fade" id="deleteWork{{$work->id}}">
      <div class="modal-dialog">
        <div class="modal-content"> --}}

          <!-- Modal Header -->
          {{-- <div class="modal-header">
                    <h4>REMOVE EMPLOYMENT</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <h6 class="modal-title h6">Are you sure you want to delete <span
                        class="text-info">"{{$work->company}}"</span> from your profile?</h6>
        </div> --}}
        <!-- Modal footer -->
        {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary deleteWork px-5" data-dismiss="modal"
                      data-id="{{$work->id}}">Yes</button>
      </div>

    </div>
  </div>
  </div>


  @endforeach
  </div>
  </div>
  </div> --}}

  <!-- Add Work History Modal -->
  {{-- <div class="modal fade" id="addwork{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">Add New Work</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body editworksbody">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i>&nbsp;Position</span>
          </div>
          <input type="text" id="addPosition" class="form-control">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Company</span>
          </div>
          <input type="text" id="addCompany" class="form-control">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
          </div>
          <input type="text" id="addWorkYear" class="form-control">
        </div>
        <div class="form-group">
          <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Description</span>
          <textarea class="form-control" id="addWorkDescription" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary addNewWorkButton" data-dismiss="modal">Save
          changes</button>
      </div>
    </div>
  </div>
  </div> --}}

  </div>
  </div>
</section>
@endsection
@section('jsplugins')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
                $('.select2').select2({
                  // dropdownParent: $('#myModal')
                  width: 'resolve', 
                  placeholder: "Please select Skills",
                  allowClear: true
                });
                $('.selectedskills').select2().val({!! json_encode($user->skills()->allRelatedIds()) !!}).trigger('change');
            });
</script>
@endsection