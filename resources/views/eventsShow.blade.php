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
                        {{ $event->title }}
                    </a>

                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                        {{ $event->description }}
                    </p>

                    <p class="flex items-center mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        <span>{{ $event->country->name }}, {{ $event->city->name }}</span>
                    </p>

                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                        <u>{{ $event->start_date->format('d-m-Y') }}</u> at <time>{{ $event->start_time }}</time>
                    </p>

                    <a href="#" class="inline-block mt-2 text-blue-500 underline hover:text-blue-400">Read
                        more</a>

                    @auth
                        <!-- comment form -->
                        <div>
                            <form action="{{ route('events.comment', $event->id) }}" method="POST"
                                class="w-full max-w-xl bg-white rounded-lg px-4 pt-2 dark:bg-gray-900">
                                @csrf

                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg dark:text-white">Add a new comment</h2>
                                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                                        <textarea
                                            class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                            name="content" id="content" placeholder='Type Your Comment' required></textarea>
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
                    @endauth
                </div>

                @auth
                    <div class="flex mt-4 space-x-4" x-data="{
                        eventLike: @js($like),
                        savedEvent: @js($savedEvent),
                        attending: @js($attending),
                        onHandleLike() {
                            axios.post(`/events-like/{{ $event->id }}`).then(res => {
                                this.eventLike = res.data
                            })
                        },
                        onHandleSavedEvent() {
                            axios.post(`/events-save/{{ $event->id }}`).then(res => {
                                this.savedEvent = res.data
                            })
                        },
                        onHandleAttending() {
                            axios.post(`/events-attending/{{ $event->id }}`).then(res => {
                                this.attending = res.data
                            })
                        }
                    }">
                        <button @click="onHandleLike"
                            class="group relative overflow-hidden rounded-lg text-lg shadow
    sm:w-36 sm:h-10 md:w-48 md:h-12 lg:h-16 xl:h-16"
                            :class="eventLike ? 'bg-blue-400' : 'bg-white'">
                            <div
                                class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                            </div>
                            <span class="relative text-black group-hover:text-white">Like</span>
                        </button>
                        <button @click="onHandleSavedEvent"
                            class="group relative overflow-hidden rounded-lg text-lg shadow
    sm:w-36 sm:h-10 md:w-48 md:h-12 lg:h-16 xl:h-16"
                            :class="savedEvent ? 'bg-blue-400' : 'bg-white'">
                            <div
                                class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                            </div>
                            <span class="relative text-black group-hover:text-white">Save</span>
                        </button>
                        <button @click="onHandleAttending"
                            class="group relative overflow-hidden rounded-lg text-lg shadow
    sm:w-36 sm:h-10 md:w-48 md:h-12 lg:h-16 xl:h-16"
                            :class="attending ? 'bg-blue-400' : 'bg-white'">
                            <div
                                class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                            </div>
                            <span class="relative text-black group-hover:text-white">Attending</span>
                        </button>

                    </div>
                @endauth

                <div class="flex items-center mt-6">
                    <img class="object-cover object-center w-10 h-10 rounded-full"
                        src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                        alt="">

                    <div class="mx-4">
                        <h1 class="text-sm text-gray-700 dark:text-gray-200">{{ $event->user->name }}</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $event->user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- display comment -->
        @foreach ($event->comments as $comment)
            <!-- component -->
            <div class="m-10 bg-gray-100 dark:bg-gray-900 flex items-center justify-center">
                <div class="px-10">
                    <div
                        class="bg-white max-w-xl rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                        <div
                            class="w-14 h-14 bg-yellow-500 rounded-full flex items-center justify-center font-bold text-white">
                            LOGO</div>
                        <div class="mt-4">
                            <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">
                                Product Review</h1>
                            <div class="flex mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <p class="mt-4 text-md text-gray-600">
                                {{ $comment->content }}
                            </p>
                            <div class="flex justify-between items-center">
                                <div class="mt-4 flex items-center space-x-4 py-6">
                                    <div class="">
                                        <img class="w-12 h-12 rounded-full"
                                            src="https://images.unsplash.com/photo-1593104547489-5cfb3839a3b5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1036&q=80"
                                            alt="" />
                                    </div>
                                    <div class="text-sm font-semibold">{{ $comment->user->name }} • <span
                                            class="font-normal">
                                        {{ $comment->created_at->diffForHumans() }}</span></div>
                                </div>

                                @if (Auth::user()->id === $comment->user_id)
                                    <div>
                                        <form
                                            action="{{ route('events.comments.destroy', [$event->id, $comment->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="ml-4 group relative overflow-hidden rounded-lg text-lg shadow sm:w-36 sm:h-10 md:w-48 md:h-12 lg:h-16 xl:h-16">
                                                <div
                                                    class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                                                </div>
                                                <span class="relative text-black group-hover:text-white">Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End display comments -->
    </section>

</x-main-layout>
