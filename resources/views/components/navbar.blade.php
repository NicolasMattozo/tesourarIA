    <!-- Botão Mobile Menu (visível apenas em mobile) -->
    <button @click="sidebarOpen = true"
        class="fixed top-4 left-4 z-50 md:hidden bg-yellow-900 text-amber-50 p-3 rounded-lg shadow-lg hover:bg-yellow-800 transition-colors"
        aria-label="Abrir menu">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Overlay Mobile -->
    <div x-show="sidebarOpen" x-transition.opacity.duration.300ms @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 md:hidden"></div>

    <!-- Sidebar -->
    <aside x-show="sidebarOpen || window.innerWidth >= 768" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-yellow-950/95 backdrop-blur-md border-r border-yellow-900/40 shadow-xl md:translate-x-0"
        @click.away="if (window.innerWidth < 768) sidebarOpen = false">
        <div class="flex flex-col h-full">
            <!-- Header/Logo -->
            <div class="p-6 border-b border-yellow-900/40">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="h-10 w-10 rounded-lg flex items-center justify-center ring-1 ring-yellow-700/40 shadow-sm">
                            <img src="/images/logo_umadpel.jpg" alt="Logo Umadpel" class="h-6 w-6 object-contain" />
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xl font-bold text-amber-50 tracking-tight">
                                Umadpel
                            </span>
                            <span class="text-xs text-amber-300/70 font-medium">
                                Tesouraria
                            </span>
                        </div>
                    </div>

                    <!-- Botão Fechar (apenas mobile) -->
                    <button @click="sidebarOpen = false"
                        class="md:hidden text-amber-200 hover:text-amber-50 transition-colors" aria-label="Fechar menu">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menu Items -->
            <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
                <a href="#" @click="if (window.innerWidth < 768) sidebarOpen = false"
                    class="group flex items-center gap-3 px-4 py-3 rounded-lg text-amber-200/80 hover:bg-yellow-900/40 hover:text-amber-50 transition-all duration-200">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('transactions.index') }}" @click="if (window.innerWidth < 768) sidebarOpen = false"
                    class="group flex items-center gap-3 px-4 py-3 rounded-lg bg-yellow-900/50 text-amber-50 font-medium border-l-4 border-amber-500">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Transação</span>
                </a>

                <a href="{{ route('events.index') }}" @click="if (window.innerWidth < 768) sidebarOpen = false"
                    class="group flex items-center gap-3 px-4 py-3 rounded-lg text-amber-200/80 hover:bg-yellow-900/40 hover:text-amber-50 transition-all duration-200">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Eventos</span>
                </a>

                <a href="{{ route('bus.index') }}" @click="if (window.innerWidth < 768) sidebarOpen = false"
                    class="group flex items-center gap-3 px-4 py-3 rounded-lg text-amber-200/80 hover:bg-yellow-900/40 hover:text-amber-50 transition-all duration-200">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16V6a3 3 0 013-3h10a3 3 0 013 3v10M4 16h16M4 16a2 2 0 002 2h1m-3-2a2 2 0 002 2h1m10-2h1a2 2 0 002-2M8 21h.01M16 21h.01M6 10h12M6 13h12" />
                    </svg>

                    <span>Ônibus</span>
                </a>


                <a href="#" @click="if (window.innerWidth < 768) sidebarOpen = false"
                    class="group flex items-center gap-3 px-4 py-3 rounded-lg text-amber-200/80 hover:bg-yellow-900/40 hover:text-amber-50 transition-all duration-200">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>Relatórios</span>
                </a>


                <!-- Usuários -->
                <a href="{{ route('users.index') }}" @click="if (window.innerWidth < 768) sidebarOpen = false"
                    class="group flex items-center gap-3 px-4 py-3 rounded-lg text-amber-200/80 hover:bg-yellow-900/40 hover:text-amber-50 transition-all duration-200">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zm-10 0a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Usuários</span>
                </a>
            </nav>

            <!-- Footer Usuário -->
            <div class="p-4 border-t border-yellow-900/40 mt-auto">
                <div class="flex items-center gap-3 text-amber-200/80">
                    <div class="w-10 h-10 rounded-full bg-yellow-800/50 flex items-center justify-center">
                        <span class="text-sm font-medium">UN</span>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium">Usuário</p>
                        <button class="text-xs text-amber-300/60 hover:text-amber-300 transition-colors">
                            sair
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </aside>
