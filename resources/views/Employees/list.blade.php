@extends('layouts.main')
{{-- @include('layouts.devExpress-links')
@include('layouts.devExpress-script') --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<div class="demo-container">
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ url('dashboard/employee/add') }}" class="btn btn-primary">Add Employee</a>
        </div>
    </div>
    <div id="gridContainer"></div>
</div>

<script>
    function loadData() {
        $(() => {
            function isNotEmpty(value) {
                return value !== undefined && value !== null && value !== '';
            }
            const store = new DevExpress.data.CustomStore({
                key: 'emp_id',
                load(loadOptions) {
                    const deferred = $.Deferred();
                    const args = {};

                    [
                        'skip',
                        'take',
                        'requireTotalCount',
                        'requireGroupCount',
                        'sort',
                        'filter',
                        'totalSummary',
                        'group',
                        'groupSummary',
                    ].forEach((i) => {
                        if (i in loadOptions && isNotEmpty(loadOptions[i])) {
                            args[i] = JSON.stringify(loadOptions[i]);
                        }
                    });
                    $.ajax({
                        url: '{{ url('dashboard/employee/list') }}',
                        dataType: 'json',
                        data: args,
                        success(result) {
                            deferred.resolve(result.data, {
                                totalCount: result.totalCount,
                                summary: result.summary,
                                groupCount: result.groupCount,
                            });
                        },
                        error() {
                            deferred.reject('Data Loading Error');
                        },
                        timeout: 5000,
                    });

                    return deferred.promise();
                },
            });

            $('#gridContainer').dxDataGrid({
                dataSource: store,
                showBorders: true,
                remoteOperations: true,
                paging: {
                    pageSize: 5,
                },
                pager: {
                    showPageSizeSelector: true,
                    allowedPageSizes: [8, 12, 20],
                },
                columns: [{
                    dataField: 'emp_id',
                    dataType: 'number',
                }, {
                    dataField: 'emp_name',
                    dataType: 'string',
                    cellTemplate: function(element, info) {
                        console.log(info);
                        element.append("<div>" + info.data.emp_name + "</div>")
                            .css("color", "blue");
                    }
                }, {
                    dataField: 'age',
                    dataType: 'number'
                }, {
                    dataField: 'gender',
                    dataType: 'string',
                }, {
                    dataField: 'dob',
                    dataType: 'date',
                }, {
                    dataField: 'doj',
                    dataType: 'date',
                }, {
                    dataField: 'dept',
                    dataType: 'number',
                }, {
                    dataField: 'city',
                    dataType: 'number',
                }, {
                    dataField: 'state',
                    dataType: 'number',
                }, {
                    dataField: 'salary',
                    dataType: 'number',
                    format: 'currency',
                }, {
                    dataField: "Action",
                    cellTemplate: function(element, info) {
                        console.log(info);
                        element.append(
                                "<select name='access_type' id='access_type' class='access_type'><option value='0'>User</option><option value='1'>Role</option></div>"
                                )
                            .css("color", "blue");
                    },
                    onChange(e){
                        console.log('klol');
                    }
                }],
            }).dxDataGrid('instance');
        });
    }

    loadData();

    $('.access_type').on('change', function() {
        console.log('sasasasa');
        // var accessType = $('.access_type').val();
        // console.log(accessType);
    });
</script>
