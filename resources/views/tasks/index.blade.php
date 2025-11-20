@extends('layouts.app')

@section('content')
    {{-- Header --}}
    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;">
        <div>
            <p style="font-size:11px; text-transform:uppercase; letter-spacing:.08em; color:#64748b; margin:0;">
                Welkom terug
            </p>
            <h1 style="font-size:24px; font-weight:600; margin:0;">Jouw taken</h1>
        </div>

        <a href="{{ route('tasks.create') }}"
           style="display:inline-flex; align-items:center; gap:8px; padding:8px 14px; border-radius:9999px; background:#22c55e; color:#020617; font-size:14px; font-weight:500; text-decoration:none;">
            + Nieuwe taak
        </a>
    </div>

    {{-- Flash message bij succes --}}
    @if(session('success'))
        <div style="margin-bottom:16px; padding:8px 12px; border-radius:8px; background:#022c22; color:#bbf7d0; font-size:13px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Als er nog geen taken zijn --}}
    @if($tasks->isEmpty())
        <div style="padding:16px; border-radius:12px; border:1px dashed #1e293b; background:#020617; max-width:600px;">
            <p style="margin:0 0 4px 0; font-weight:500;">Nog geen taken</p>
            <p style="margin:0; font-size:13px; color:#94a3b8;">
                Klik op <strong>“Nieuwe taak”</strong> om je eerste taak aan te maken.
            </p>
        </div>
    @else
        {{-- Lijst van echte taken --}}
        <div style="display:flex; flex-direction:column; gap:8px; max-width:700px;">
            @foreach($tasks as $task)
                <div style="display:flex; align-items:flex-start; gap:10px; padding:12px 14px; border-radius:12px; background:#020617; border:1px solid #1e293b;">
                    <div>
                        <input type="checkbox" style="margin-top:4px;">
                    </div>

                    <div style="flex:1;">
                        <div style="display:flex; align-items:center; justify-content:space-between;">
                            <h2 style="font-size:14px; font-weight:500; margin:0;">
                                {{ $task->title }}
                            </h2>
                            @if($task->due_date)
                                <span style="font-size:11px; color:#e5e7eb;">
                                    Deadline: {{ $task->due_date }}
                                </span>
                            @endif
                        </div>

                        @if($task->description)
                            <p style="margin:4px 0 0 0; font-size:13px; color:#94a3b8;">
                                {{ $task->description }}
                            </p>
                        @endif
                    </div>

                    {{-- Acties --}}
                    <div style="display:flex; flex-direction:column; gap:4px; font-size:11px;">
                        <a href="{{ route('tasks.edit', $task) }}" style="color:#38bdf8; text-decoration:none;">
                            Bewerken
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Taak verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:#f97373; padding:0; cursor:pointer;">
                                Verwijderen
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
