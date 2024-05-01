@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!--begin::Content-->


    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Faq</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Faq <span
                            class="ms-2 badge bg-danger">{{ count($faqs) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                    Faq</a>

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="" class="btn btn-light-danger btn-sm" id="deleteAllSelectedRecord">Delete Select</a>
                    <!--begin::Table-->

                    <table id="kt_datatable_example_5" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 40px;"><input type="checkbox" autocomplete="off" name=""
                                        id="select_all_ids"></th>
                                <th style="width: 30px;">No</th>
                                <th>Category</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th style="width: 70px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $key => $faq)
                                <tr id="faq_ids{{ $faq->id }}">

                                    <td><input type="checkbox" name="ids" class="checkbox_ids" id=""
                                            value="{{ $faq->id }}"></td>

                                    <td>{{ $key + 1 }}</td>

                                    <td>{{ $faq->category }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->answer }}</td>
                                    <td>{{ $faq->order }}</td>
                                    <td>
                                        @if ($faq->status == 1)
                                            <span class="badge badge-light-success">Is_active</span>
                                        @else
                                            <span class="badge badge-light-danger">Is_inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($faq->status == 1)
                                            <a href="{{ route('faq.inactive', $faq->id) }}" title="Inactive"><i
                                                    class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                        @else
                                            <a href="{{ route('faq.active', $faq->id) }}" title="Active"><i
                                                    class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                        @endif

                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $faq->id }}" class="ms-1" title="Edit"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                        {{-- Edit Modal --}}

                                        <div class="modal fade" id="editModal{{ $faq->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                            Update
                                                            Faq</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('update.faq') }}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $faq->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-8">

                                                                    <div class="form-group mb-3">
                                                                        <label for=""
                                                                            class="mb-2">Category</label>
                                                                        <input type="text" name="category"
                                                                            class="form-control form-control-sm @error('category') is-invalid @enderror"
                                                                            placeholder="Category" autocomplete="off"
                                                                            value="{{ $faq->category }}">
                                                                        @error('category')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                </div>

                                                                <div class="col-4">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Order</label>
                                                                        <input type="number" name="order"
                                                                            class="form-control form-control-sm @error('order') is-invalid @enderror"
                                                                            placeholder="E.g:100" autocomplete="off"
                                                                            value="{{ $faq->order }}">
                                                                        @error('order')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group mb-3">
                                                                        <label for=""
                                                                            class="mb-2">Question</label>
                                                                        <input type="text" name="question"
                                                                            class="form-control form-control-sm @error('question') is-invalid @enderror"
                                                                            placeholder="Question"
                                                                            value="{{ $faq->question }}">

                                                                        @error('question')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group mb-3">
                                                                        <label for=""
                                                                            class="mb-2">Answer</label>
                                                                        <textarea class="form-control form-control-sm @error('answer') is-invalid @enderror" placeholder="Answer"
                                                                            name="answer">{{ $faq->answer }}</textarea>
                                                                        @error('answer')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">Update
                                                                Faq</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('delete.faq', $faq->id) }}" class="ms-1" id="delete"
                                            title="Delete"><i class="bi bi-trash3-fill fs-3 text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->

    {{-- Modal --}}

    <!-- Button trigger modal -->


    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Faq</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.faq') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-8">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Category</label>
                                    <input type="text" name="category"
                                        class="form-control form-control-sm @error('category') is-invalid @enderror"
                                        placeholder="Category" autocomplete="off">
                                    @error('category')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-4">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Order</label>
                                    <input type="number" name="order"
                                        class="form-control form-control-sm @error('order') is-invalid @enderror"
                                        placeholder="E.g:100" autocomplete="off">
                                    @error('order')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Question</label>
                                    <input type="text" name="question"
                                        class="form-control form-control-sm @error('question') is-invalid @enderror"
                                        placeholder="Question">

                                    @error('question')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Answer</label>
                                    <textarea class="form-control form-control-sm @error('answer') is-invalid @enderror" placeholder="Answer"
                                        name="answer"></textarea>
                                    @error('answer')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Add Faq</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    <script>
        $(function(e) {

            $("#select_all_ids").click(function() {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });

            $('#deleteAllSelectedRecord').click(function(e) {

                e.preventDefault();
                var all_ids = [];

                $('input:checkbox[name=ids]:checked').each(function() {

                    all_ids.push($(this).val());

                });

                $.ajax({

                    url: "{{ route('faq.select.delete') }}",
                    type: "GET",
                    data: {
                        ids: all_ids,
                        _token: '{{ csrf_token() }}'
                    },

                    success: function(response) {
                        $.each(all_ids, function(key, val) {

                            $('#faq_ids' + val).remove();
                            window.location.reload();

                        })

                    }
                });

            });

        });
    </script>

    {{-- Data Table  --}}
    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>
@endsection
