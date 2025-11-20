@extends('layouts.app')

@section('content')
    <h1 style="font-size:22px; font-weight:600; margin-bottom:12px;">Nieuwe taak</h1>

    {{-- Validatiefouten tonen --}}
    @if($errors->any())
        <div style="margin-bottom:16px; padding:10px 12px; border-radius:10px; background:#450a0a; color:#fecaca; font-size:13px;">
            <strong>Oeps, er ging iets mis:</strong>
            <ul style="margin:6px 0 0 16px; padding:0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST" style="max-width:500px;">
        @csrf

        <div style="margin-bottom:12px;">
            <label style="display:block; font-size:13px; margin-bottom:4px;">Titel *</label>
            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   style="width:100%; padding:8px; border-radius:8px; border:1px solid #1e293b; background:#020617; color:#e5e7eb;">
        </div>

        <div style="margin-bottom:12px;">
            <label style="display:block; font-size:13px; margin-bottom:4px;">Beschrijving</label>
            <textarea name="description"
                      rows="4"
                      style="width:100%; padding:8px; border-radius:8px; border:1px solid #1e293b; background:#020617; color:#e5e7eb;">{{ old('description') }}</textarea>
        </div>

        <div style="margin-bottom:16px;">
            <label style="display:block; font-size:13px; margin-bottom:4px;">Deadline</label>
            <input type="date"
                   name="due_date"
                   value="{{ old('due_date') }}"
                   style="padding:8px; border-radius:8px; border:1px solid #1e293b; background:#020617; color:#e5e7eb;">
        </div>

        <div style="display:flex; gap:8px;">
            <button type="submit"
                    style="padding:8px 14px; border-radius:9999px; border:none; background:#22c55e; color:#020617; font-weight:500; cursor:pointer;">
                Opslaan
            </button>

            <a href="{{ route('tasks.index') }}"
               style="padding:8px 14px; border-radius:9999px; border:1px solid #1e293b; text-decoration:none; color:#e5e7eb; font-size:14px;">
                Annuleren
            </a>
        </div>
    </form>
@endsection
