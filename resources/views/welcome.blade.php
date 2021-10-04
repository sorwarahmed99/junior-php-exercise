@extends('layout.master')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
        <h2 class="text-2xl font-extrabold text-gray-900">Junior PHP Exercises</h2>
        <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">

            <div class="group relative">
                <div class="relative px-5 py-2 w-full h-auto bg-white rounded-lg overflow-hidden">
                    <div class="mt-3">
                        <h2 class="text-lg font-semibold">UNIX Time converter</h2>
                    </div>

                    <div>
                        <form class="mt-5 space-y-6" id="unixTimeForm">
                            <div class="rounded-md shadow-sm -space-y-px">
                              <div>
                                  <label for="unix-timestamp" class="sr-only">Unix Timestamp</label>
                                  <input id="unix-timestamp" name="time" type="number" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Enter a UNIX timestamp ">
                              </div>
                            </div>
                            <div>
                                <button class="convert-unix-timestamp group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                  Submit
                                </button>
                            </div>
                        </form>
                        <div class="flex items-center justify-center">
                            <h2 class="success mt-6 text-lg font-semibold text-gray-500" ></h2>
                        </div>
                        <div class="flex justify-center item-center">
                            <a href="#" id="showUnixTime" class="text-sm font-semibold text-indigo-500 hover:underline">See Previous result</a>
                            <a href="#" id="hideUnixTime" class="text-sm font-semibold text-indigo-500 hidden hover:underline">Hide Previous result</a>
                        </div>

                        <div class="times mt-3" style="display:none;">
                            <div class="flex flex-col mb-10">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                      <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                          <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              #
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              Unix time
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                              Converted
                                            </th>
                                          </tr>
                                        </thead>
                                        <tbody id="unixTable" class="bg-white divide-y divide-gray-200">
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group relative">
                <div class="relative px-5 py-2 w-full h-auto bg-white rounded-lg overflow-hidden">
                    <div class="mt-3">
                        <h2 class="text-lg font-semibold">Email validation</h2>
                    </div>
                    <form class="mt-5 space-y-6" id="emailValidateForm">
                        @csrf
                        <div class="rounded-md shadow-sm -space-y-px">
                          <div>
                            <label for="email" class="sr-only">Email</label>
                            <input id="email" name="email" type="text" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Enter email address ">
                          </div>
                        </div>
                        <div>
                          <button type="submit" class="validate-email group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Submit
                          </button>
                        </div>
                    </form>
                    <div class="flex items-center justify-center">
                        <h2 class="isValid mt-6 text-lg font-semibold text-gray-500" ></h2>
                    </div>
                    <div class="flex justify-center item-center">
                        <a href="#" id="showEmails" class="text-sm font-semibold text-indigo-500 hover:underline">See Previous result</a>
                    </div>

                    <div class="emails mt-3" style="display:none;">
                        <div class="flex flex-col mb-10 ">
                            <div class="-my-2 overflow-x-auto scrollbar-hide sm:-mx-6 lg:-mx-8">
                              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                  <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                      <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          #
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Is Valid
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody id="emailsTable" class="bg-white divide-y divide-gray-200">
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="group relative">
                <div class="relative px-5 py-2 w-full h-auto bg-white rounded-lg overflow-hidden">
                    <div class="mt-3">
                        <h2 class="text-lg font-semibold">Flip a Coin</h2>
                    </div>
                    <form class="mt-5 space-y-6" id="FlipForm">
                        <div class="rounded-md shadow-sm -space-y-px">
                          <div>
                            <label for="number-of-time" class="sr-only">Flip coin</label>
                            <input id="number-of-time" name="number" type="number" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Number of flips">
                          </div>
                        </div>

                        <div>
                          <button type="submit" class="flip group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Flip
                          </button>
                        </div>
                      </form>
                      <div class="flex items-center mt-2 justify-around hidden coinResult">
                        <h2 class="text-lg font-semibold text-gray-500">Heads: <span class="head"></span>%</h2>
                        <h2 class="text-lg font-semibold text-gray-500">Tails: <span class="tail"></span>%<h2>
                      </div>

                    <div class="flex justify-center item-center mt-6">
                        <a href="#" id="showFlips" class="text-sm font-semibold text-indigo-500 hover:underline">See Previous result</a>
                    </div>

                    <div class="flips mt-3" style="display:none;">
                        <div class="flex flex-col mb-10">
                            <div class="-my-2 overflow-x-auto scrollbar-hide sm:-mx-6 lg:-mx-8">
                              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                  <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                      <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          #
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          No. of flips
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          Heads %
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tails %
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody id="coinsTable" class="bg-white divide-y divide-gray-200">

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
