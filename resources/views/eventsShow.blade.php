<x-main-layout>

    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">From the blog</h1>

            <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96"
                    src="{{ asset('/storage/' . $event->image) }}" alt="">



                <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                    <p class="text-sm text-blue-500 uppercase">category</p>

                    <a href="#"
                        class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-white md:text-3xl">
                        All the features you want to know
                    </a>

                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure veritatis sint autem nesciunt,
                        laudantium quia tempore delect
                    </p>

                    <a href="#" class="inline-block mt-2 text-blue-500 underline hover:text-blue-400">Read
                        more</a>


                    <!-- comment form -->
                    <div>
                        <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                                <div class="w-full md:w-full px-3 mb-2 mt-2">
                                    <textarea
                                        class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                        name="body" placeholder='Type Your Comment' required></textarea>
                                </div>
                                <div class="w-full flex items-start md:w-full px-3">
                                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                        <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-xs md:text-sm pt-px">Some HTML is okay.</p>
                                    </div>
                                    <div class="m-4">
                                        <button type="submit"
                                            class="group relative overflow-hidden rounded-lg bg-white text-lg shadow sm:w-36 sm:h-10 md:w-48 md:h-12 lg:h-16 xl:h-16">
                                            <div
                                                class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                                            </div>
                                            <span class="relative text-black group-hover:text-white">Post comment</span>
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- end comment form -->

                </div>


                <div class="flex mt-4 space-x-4">
                    <button
                        class="group relative overflow-hidden rounded-lg bg-white text-lg shadow
    sm:w-36 sm:h-10 md:w-48 md:h-12 lg:h-16 xl:h-16">
                        <div
                            class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                        </div>
                        <span class="relative text-black group-hover:text-white">Like</span>
                    </button>
                    <button
                        class="group relative overflow-hidden rounded-lg bg-white text-lg shadow
    sm:w-36 sm:h-10 md:w-48 md:h-12 lg:h-16 xl:h-16">
                        <div
                            class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                        </div>
                        <span class="relative text-black group-hover:text-white">Save</span>
                    </button>
                    <button
                        class="group relative overflow-hidden rounded-lg bg-white text-lg shadow
    sm:w-36 sm:h-10 md:w-48 md:h-12 lg:h-16 xl:h-16">
                        <div
                            class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                        </div>
                        <span class="relative text-black group-hover:text-white">Attending</span>
                    </button>

                </div>

                <div class="flex items-center mt-6">
                    <img class="object-cover object-center w-10 h-10 rounded-full"
                        src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                        alt="">

                    <div class="mx-4">
                        <h1 class="text-sm text-gray-700 dark:text-gray-200">Amelia. Anderson</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Lead Developer</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

</x-main-layout>
