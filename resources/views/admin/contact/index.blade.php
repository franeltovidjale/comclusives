@extends('layouts.admin')
@section('title', 'Messages de contact')

@section('content')
<div class="p-6 max-w-4xl">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-bold" style="font-family:Outfit,sans-serif">Messages de contact</h1>
        <span class="text-sm text-gray-400">{{ $messages->total() }} message{{ $messages->total() > 1 ? 's' : '' }}</span>
    </div>

    @if($messages->isEmpty())
        <div class="bg-white rounded-2xl border border-gray-100 p-12 text-center text-sm text-gray-400">
            Aucun message reçu pour l'instant.
        </div>
    @else
    <div class="space-y-4">
        @foreach($messages as $msg)
        <div class="bg-white rounded-2xl border border-gray-100 p-5">
            <div class="flex items-start justify-between gap-4">
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-3 flex-wrap mb-1">
                        <span class="font-semibold text-sm">{{ $msg->name }}</span>
                        <a href="mailto:{{ $msg->email }}" class="text-xs text-primary hover:underline">{{ $msg->email }}</a>
                        @if($msg->phone)
                            <span class="text-xs text-gray-400">{{ $msg->phone }}</span>
                        @endif
                        <span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">{{ $msg->topic }}</span>
                        <span class="text-xs text-gray-400 ml-auto">{{ $msg->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <p class="text-sm text-gray-700 leading-relaxed mt-2 whitespace-pre-wrap">{{ $msg->body }}</p>
                </div>
                <div class="flex items-center gap-2 shrink-0">
                    <a href="mailto:{{ $msg->email }}?subject=Re: {{ $msg->topic }}"
                       title="Répondre"
                       style="background:none;border:none;cursor:pointer;padding:4px;color:#0a6b63;display:flex;align-items:center">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="9 17 4 12 9 7"/><path d="M20 18v-2a4 4 0 0 0-4-4H4"/></svg>
                    </a>
                    <form method="POST" action="{{ route('admin.contact.destroy', $msg) }}"
                          onsubmit="return confirm('Supprimer ce message ?')">
                        @csrf @method('DELETE')
                        <button type="submit" title="Supprimer"
                                style="background:none;border:none;cursor:pointer;padding:4px;color:#f87171;display:flex;align-items:center">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/>
                                <path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-6">{{ $messages->links() }}</div>
    @endif
</div>
@endsection
