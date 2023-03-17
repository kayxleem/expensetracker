<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/datepicker.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="h-screen relative">
        @if (session('status'))
        <div style="right: 25%; left: 25%" class="flex z-100 absolute items-center bg-blue-500 top-0  mx-auto justify-center w-50 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{session('status')}}</p>
        </div>
        @endif
        <div class="flex flex-row items-center px-4 justify-between" style="background-color: hsl(214, 35%, 21%); height: 10%;">
            <h2 class="text-white text-xl font-bold">Expense Manager</h2>
            <div class="flex flex-row space-x-3">
                <button style="background-color: #2d3d53;color: #66a8ff" class="text-sm p-2 rounded-sm">INFO</button>
                <button style="background-color: #2d3d53; color: #66a8ff" class="text-sm p-2 rounded-sm">LOGOUT</button>
            </div>
        </div>



        <div class="flex flex-row md:justify-between  justify-center" style="height: 90%;">

            <div class="hidden shadow-inner lg:block px-4 py-2  w-80" style="background-color: #f3f5f7;">
                <div class="flex flex-row border-b py-2  border-gray-300 justify-between">
                    <span class="text-sm text-gray-600">Filter Expenses</span>
                    <span class="text-sm text-blue-600 cursor-pointer">Clear Filters</span>
                </div>

                <form action="/" method="get">
                <div date-rangepicker="" class="flex mt-7 flex-col ">
                    <span class="text-sm text-gray-500">From</span>
                    <div class="relative mb-3">
                        <div class="flex absolute inset-y-0 right-2 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="filter[from]" type="text" class="bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2  datepicker-input">
                    </div>
                    <span class="text-sm text-gray-500">To</span>
                    <div class="relative mb-3">
                        <div class="flex absolute inset-y-0 right-2 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="filter[to]" type="text" class="bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2  datepicker-input">
                    </div>
                </div>
                <div class="flex flex-row justify-between space-x-1">
                    <div>
                        <span class="text-sm text-gray-500">Min</span>
                        <div class="relative mb-3">
                            <input name="filter[min]" type="number" class="bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-28 pl-10 p-2  datepicker-input">
                        </div>
                    </div>
                    <span class="flex items-center">-</span>
                    <div>
                        <span class="text-sm text-gray-500">Max</span>
                        <div class="relative mb-3">
                            <input name="filter[max]" type="number" class="bg-gray-300 border border-gray-300 text-gray-900 sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-28 pl-10 p-2  datepicker-input">
                        </div>
                    </div>

                </div>

                <label for="merchant" class="text-sm text-gray-500">Merchant</label>
                <select name="merchant" id="merchant" class="bg-gray-300 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 ">
                    <option value="" selected></option>
                    <option value="US">Office Supplies</option>
                    <option value="CA">Electronics</option>
                    <option value="FR">Hotel</option>
                    <option value="DE">Live Sharing</option>
                    <option value="DE">Fast Food</option>
                    <option value="DE">Rental Car</option>
                    <option value="DE">Breakfast</option>
                    <option value="DE">Airline</option>
                    <option value="DE">Parking</option>
                    <option value="DE">Anime</option>
                    <option value="DE">Shuttle</option>
                    <option value="DE">Restaurant</option>
                    <option value="DE">Taxi</option>
                </select>

                <label for="status" class="text-sm text-gray-500">Status</label>
                <div class="items-center mt-1 flex ">
                    <div class="items-center flex">
                        <input name="filter[status]" id="default-checkbox" type="checkbox" value="new" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300  dark:ring-offset-gray-800  dark:bg-gray-700 dark:border-gray-600">
                        <label for="disabled-checkbox" class="ml-2 text-gray-800">New</label>
                    </div>
                    <div class="items-center ml-3 flex">
                        <input name="filter[status]" id="default-checkbox" type="checkbox" value="inprogress" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300  dark:ring-offset-gray-800  dark:bg-gray-700 dark:border-gray-600">
                        <label for="disabled-checkbox" class="ml-2 text-gray-800">In Progress</label>
                    </div>
                </div>
                <div class="items-center mt-1 flex">
                    <input name="filter[status]" id="default-checkbox" type="checkbox" value="reimbursed" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300  dark:ring-offset-gray-800  dark:bg-gray-700 dark:border-gray-600">
                    <label for="disabled-checkbox" class="ml-2 text-gray-800">Reimbursed</label>
                </div>

                <input type="submit" class="bg-transparent p-1 rounded-sm font-semibold text-blue-600 hover:text-blue-400" value="search">
                </form>

            </div>

            <div class="flex relative justify-center overflow-scroll h-full w-full">
                <div class=" w-full p-0">

                    <table id="example" class="table overflow-auto" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="font-normal text-gray-700 text-sm">Date</th>
                                <th class="font-normal text-gray-700 text-sm">Merchant</th>
                                <th class="font-normal text-gray-700 text-sm">Total</th>
                                <th class="font-normal text-gray-700 text-sm">Status</th>
                                <th class="font-normal text-gray-700 text-sm">Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($expense->count())
                            @foreach($expense as $item)
                            <tr onclick="toggleModal('modalEdit-id-{{$item->id}}')" class="hover:bg-gray-200 cursor-pointer">
                                <td class="text-gray-700">{{$item->date}}</td>
                                <td class="text-gray-700">{{$item->merchant}}</td>
                                <td class="text-gray-700">₦{{$item->total}}</td>
                                <td class="{{$item->status == 'Reimbursed' ? 'text-gray-700' : ($item->status == 'In Progress' ? 'text-gray-500 italic' : 'text-red-500' )}}">{{$item->status}}</td>
                                <td class="text-gray-700">{{$item->comment}}</td>
                            </tr>

                            <!-- Edit modal  -->

                            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modalEdit-id-{{$item->id}}">
                                <div class="relative w-80 py-2 px-7  md:w-auto md:h-auto my-6 mx-auto">
                                    <!--content-->
                                    <div class="border-0 rounded-md shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                        <!--header-->
                                        <div class="flex md:flex-row flex-col md:space-x-8 justify-between items-center  md:p-4">
                                            <div class="md:w-80 w-1/2">
                                                <h2 class="font-bold text-2xl md:mt-4 md:mb-3">Edit Expense</h2>
                                                <form action="/expense/edit/{{$item->id}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div>
                                                        <label for="countries" class="text-sm text-gray-500">Merchant*</label>
                                                        <select id="countries" name="merchant" class="bg-gray-200 border mb-2 border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 ">
                                                            <option value="{{$item->merchant}}" selected>{{$item->merchant}}</option>
                                                            <option value="Office Supplies">Office Supplies</option>
                                                            <option value="Electronics">Electronics</option>
                                                            <option value="Hotel">Hotel</option>
                                                            <option value="Live Sharing">Live Sharing</option>
                                                            <option value="Fast Food">Fast Food</option>
                                                            <option value="Rental Car">Rental Car</option>
                                                            <option value="Breakfast">Breakfast</option>
                                                            <option value="Airline">Airline</option>
                                                            <option value="Parking">Parking</option>
                                                            <option value="Anime">Anime</option>
                                                            <option value="Shuttle">Shuttle</option>
                                                            <option value="Restaurant">Restaurant</option>
                                                            <option value="Taxi">Taxi</option>
                                                        </select>
                                                    </div>

                                                    <div>
                                                        <span class="text-sm text-gray-500">Total*</span>
                                                        <div class="relative mb-3">
                                                            <input name="total" type="number" value="{{$item->total}}" class="bg-gray-200 border border-gray-200 text-gray-900 sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2  datepicker-input">
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <span class="text-sm text-gray-500">Date*</span>
                                                        <div class="relative mb-3">
                                                            <div class="flex absolute inset-y-0 right-2 items-center pl-3 pointer-events-none">
                                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                                                </svg>
                                                            </div>
                                                            <input name="date" value="{{$item->date}}" type="text" class="bg-gray-200 border border-gray-200 text-gray-900 sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2  datepicker-input">
                                                        </div>
                                                    </div>

                                                    <div class="mb-2">
                                                        <span class="text-sm text-gray-500">Comment</span>
                                                        <div class="relative mb-3">
                                                            <textarea name="comment" type="text" class="bg-gray-200 border border-gray-200 text-gray-900 sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full h-28 pl-10 p-2">{{$item->comment}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center space-x-3 mb-2">
                                                        <button class="bg-blue-500 text-white active:bg-blue-600 hover:bg-blue-600 font-semibold px-4  text-md py-2 rounded-sm  ease-linear transition-all duration-150" type="submit">
                                                            Update
                                                        </button>
                                                        <button class="text-blue-500 bg-gray-200  px-2 py-2 text-md hover:bg-blue-500 hover:text-gray-200  rounded-sm   ease-linear transition-all duration-150" type="button" onclick="toggleEditModal('modalEdit-id-{{$item->id}}')">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>



                                            </div>
                                            <div>
                                                <div class="flex flex-col justify-center md:h-96 items-center w-1/2 md:w-80">
                                                    <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-full bg-white rounded-lg border-2 border-gray-100 border-dashed cursor-pointer dark:hover:bg-gray-200 dark:bg-white hover:bg-gray-100 dark:border-gray-300 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <img src="{{ asset('/receipt/'.$item->image) }}" style="height:120px; width:200px"/>
                                                        
                                                    </label>
                                                </div>
                                                <div class="absolute bottom-6 right-7">
                                                    <form action="/expense/delete/{{$item->id}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="bg-transparent p-1 rounded-sm font-semibold text-red-600 hover:text-red-400" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modalEdit-id-{{$item->id}}-backdrop"></div>



                            @endforeach
                            @else
                            <td class="text-red-500">No expense yet.. Add by clicking the button below</td>
                            @endif

                        </tbody>
                        <tfoot class="hidden">
                            <tr>
                                <th>Date</th>
                                <th>Merchant</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Comment</th>
                            </tr>
                        </tfoot>

                    </table>




                </div>






                <button type="button" onclick="toggleModal('modal-id')" class=" shadow-md shadow-gray-600 absolute bg-[#ff4238] hover:bg-[#ccc] bottom-56 right-2 md:bottom-8 md:right-3 flex p-2 h-14 w-14 items-center justify-center rounded-full">
                    <i class="fa fa-plus text-white" aria-hidden="true"></i>

                </button>



                <!-- Add modal -->
                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                    <div class="relative w-80 py-2 px-7  md:w-auto md:h-auto my-6 mx-auto">
                        <!--content-->
                        <div class="border-0 rounded-md shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                            <!--header-->
                            <div class="flex md:flex-row flex-col md:space-x-8 justify-between items-center  md:p-4">
                                <div class="md:w-80 w-1/2">
                                    <h2 class="font-bold text-2xl md:mt-4 md:mb-3">Add Expense</h2>
                                    <form action="{{route('expense')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <label for="countries" class="text-sm text-gray-500">Merchant*</label>
                                            <select id="countries" name="merchant" class="bg-gray-200 border mb-2 border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 ">
                                                <option value="Office Supplies">Office Supplies</option>
                                                <option value="Electronics">Electronics</option>
                                                <option value="Hotel">Hotel</option>
                                                <option value="Live Sharing">Live Sharing</option>
                                                <option value="Fast Food">Fast Food</option>
                                                <option value="Rental Car">Rental Car</option>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Airline">Airline</option>
                                                <option value="Parking">Parking</option>
                                                <option value="Anime">Anime</option>
                                                <option value="Shuttle">Shuttle</option>
                                                <option value="Restaurant">Restaurant</option>
                                                <option value="Taxi">Taxi</option>
                                            </select>
                                        </div>

                                        <div>
                                            <span class="text-sm text-gray-500">Total*</span>
                                            <div class="relative mb-3">
                                                <input name="total" type="number" class="bg-gray-200 border border-gray-200 text-gray-900 sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2  datepicker-input">
                                            </div>
                                        </div>
                                        <div date-rangepicker="" class="flex mt-7 flex-col ">
                                            <span class="text-sm text-gray-500">Date2*</span>
                                            <div class="relative max-w-sm">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input datepicker name="date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                            </div>
                                            
                                        </div>
                                        <div class="mb-2">
                                            <span class="text-sm text-gray-500">Comment</span>
                                            <div class="relative mb-3">
                                                <textarea name="comment" type="text" class="bg-gray-200 border border-gray-200 text-gray-900 sm:text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full h-28 pl-10 p-2"></textarea>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3 mb-2">
                                            <button class="bg-blue-500 text-white active:bg-blue-600 hover:bg-blue-600 font-semibold px-4  text-md py-2 rounded-sm  ease-linear transition-all duration-150" type="submit">
                                                Save
                                            </button>
                                            <button class="text-blue-500 bg-gray-200  px-2 py-2 text-md hover:bg-blue-500 hover:text-gray-200  rounded-sm   ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                                Cancel
                                            </button>
                                        </div>




                                </div>
                                <div>
                                    
                                    
                                    <div class="flex justify-center md:h-96 items-center w-1/2 md:w-80">
                                        <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-full bg-white rounded-lg border-2 border-gray-100 border-dashed cursor-pointer dark:hover:bg-gray-200 dark:bg-white hover:bg-gray-100 dark:border-gray-300 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload Receipt</span> </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">JPG/PNG</p>
                                            </div>
                                            <input id="dropzone-file" type="file" name="image" />
                                        </label>
                                    </div>
                                    </form>
                                    <form action="{{route('import-expense')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="absolute bottom-6 right-7">

                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold"></p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">Import from Excel</p>
                                            <input type="file" name="file">
                                            <input type="submit" class="bg-transparent p-1 rounded-sm font-semibold text-blue-600 hover:text-blue-400" value="Import From excel file"> 

                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>






                <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>




            </div>

            <div>
                <div class=" hidden xl:block w-72 px-4 py-3 shadow-inner" style="background-color: #f3f5f7; height: 100%">
                    <div class="flex flex-row border-b py-2 border-gray-300 justify-between">
                        <span class="text-sm text-gray-600">To be reimbursed</span>
                    </div>
                    <span class="text-4xl justify-center font-semibold self-center flex mt-11">₦{{number_format($totalN)}}</span>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: false,
                searching: false,
                bInfo: false
            });
        });

        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }

        function toggleEditModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>

</body>

</html>