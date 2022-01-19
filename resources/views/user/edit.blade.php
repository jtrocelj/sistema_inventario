@extends('layouts.main')
@include('layouts.headers.cards2')
@section('template_title')
    Update User
@endsection

@section('content')
    <section class="content container-fluid">
        

                @includeif('partials.errors')

                
               
                    
                        <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
