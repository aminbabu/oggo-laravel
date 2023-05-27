@extends('emails.layouts.app')

@section('title', 'Contact Mail')

@section('title-seperator', '|')

@section('content')
    <!-- start page header -->
    <section class="page_header email_page_header">
        <div class="bg_holder"
            style="background-image: url('{{ asset('frontend/assets/images/email/header_bg.png') }}');">
        </div>
    </section>
    <!-- end page header -->

    <!-- start page content -->
    <section class="py-5">
        <div class="container py-5">
            <h1 class="text-capitalize mb-5 text-center">
                @isset($data['subject'])
                    {{ $data['subject'] }}
                @else
                    Someone needs assessments!
                @endisset
            </h1>
            <p class="mb-3">Contact Details:</p>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>
                                @isset($data['name'])
                                    {{ $data['name'] }}
                                @endisset
                            </td>
                            <td>
                                @isset($data['email'])
                                    {{ $data['email'] }}
                                @endisset
                            </td>
                            <td>
                                @isset($data['name'])
                                    {{ Str::substr($data['subject'], 0, 36) . '...' }}
                                @endisset
                            </td>
                            <td>
                                @isset($data['name'])
                                    {{ Str::substr($data['message'], 0, 36) . '...' }}
                                @endisset
                            </td>
                            <td class="text-center">
                                <a href="{{ route('home') }}/admin" class="btn1">
                                    Check it
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-5 text-center">
                <a href="{{ route('home') }}/admin" class="btn1" style="min-width: 10rem;">Check it out</a>
            </div>
        </div>
    </section>
    <!-- end page content -->


@endsection
