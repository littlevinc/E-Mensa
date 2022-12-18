@extends('layouts.website')

@section('header')

    <x-navbar/>

@endsection

@section('content')

    <section>


        <form action="" method="POST">

            <div class="formfield">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="formfield">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="formfield">
                <input type="submit" name="submit" value="Einloggen">
            </div>




        </form>

        <div>

        </div>


    </section>



@endsection

@section('footer')
    @include('includes.default_footer')
@endsection
