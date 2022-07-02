@extends('welcome')
@section('content')
<hr>
<div class="card">
    <div class="row">
        <div class="col-xl-4 col-md-6 mt-5">
            <div class="card" style="border: 2px solid">
                <a href="{{ route('mijozlar') }}" class="p-0">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                              </svg>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-red mx-4">Мижозлар</h5>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-c-red">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">
                                    Мижозлар
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mt-5">
            <div class="card" style="border: 2px solid">
                <a href="{{ route('usta') }}" class="p-0">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-wrench-adjustable" viewBox="0 0 16 16">
                                    <path d="M16 4.5a4.492 4.492 0 0 1-1.703 3.526L13 5l2.959-1.11c.027.2.041.403.041.61Z"/>
                                    <path d="M11.5 9c.653 0 1.273-.139 1.833-.39L12 5.5 11 3l3.826-1.53A4.5 4.5 0 0 0 7.29 6.092l-6.116 5.096a2.583 2.583 0 1 0 3.638 3.638L9.908 8.71A4.49 4.49 0 0 0 11.5 9Zm-1.292-4.361-.596.893.809-.27a.25.25 0 0 1 .287.377l-.596.893.809-.27.158.475-1.5.5a.25.25 0 0 1-.287-.376l.596-.893-.809.27a.25.25 0 0 1-.287-.377l.596-.893-.809.27-.158-.475 1.5-.5a.25.25 0 0 1 .287.376ZM3 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"/>
                                  </svg>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-red mx-4">Усталар</h5>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-c-red">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">
                                    Усталар
                                </p>
                            </div>
                        </div>            
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mt-5">
            <div class="card" style="border: 2px solid">
                <a href="{{ route('bajarilgan') }}" class="p-0">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-server" viewBox="0 0 16 16">
                                <path d="M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z"/>
                                <path d="M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.667V6.334a6.51 6.51 0 0 1-1.458.79C11.81 7.684 9.967 8 8 8c-1.966 0-3.809-.317-5.208-.876a6.508 6.508 0 0 1-1.458-.79z"/>
                                <path d="M14.667 11.668a6.51 6.51 0 0 1-1.458.789c-1.4.56-3.242.876-5.21.876-1.966 0-3.809-.316-5.208-.876a6.51 6.51 0 0 1-1.458-.79v1.666C1.333 14.806 4.318 16 8 16s6.667-1.194 6.667-2.667v-1.665z"/>
                                </svg>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-red mx-4">Бажарилган ишлар</h5>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-c-red">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">
                                    Бажарилган ишлар
                                </p>
                            </div>
                        </div>            
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection