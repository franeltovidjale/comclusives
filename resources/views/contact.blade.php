@extends('layouts.app')
@section('title','Contact')
@section('content')


        <!-- HERO -->
        <section class="relative -mt-20 pt-20 overflow-hidden hero-gradient">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 text-center" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 text-xs font-semibold text-primary uppercase tracking-wider" style="backdrop-filter:blur(10px)">
                    <i data-lucide="mail" class="h-3.5 w-3.5"></i> Contact
                </span>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight leading-tight mt-6 mb-6">
                    Prenons <span class="text-primary">contact</span>
                </h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                    Nous sommes là pour vous écouter, échanger et collaborer. Que vous ayez une question, une suggestion ou un projet à partager, n'hésitez pas. Chaque message compte.
                </p>
            </div>
        </section>

        <!-- FORMULAIRE + INFOS -->
        <section class="section-padding">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="rounded-[2rem] bg-card shadow-soft p-8 md:p-12 grid lg:grid-cols-5 gap-10" data-aos="fade-up">

                    <!-- Infos -->
                    <div class="lg:col-span-2">
                        <span class="text-xs uppercase tracking-widest text-primary font-semibold">Informations</span>
                        <h2 class="text-3xl md:text-4xl font-bold mt-3 mb-4">Contactez-nous</h2>
                        <p class="text-muted-foreground mb-6">Nous répondons généralement sous 48 heures. Pour une réponse plus rapide, rejoignez notre chaîne WhatsApp.</p>
                        <div class="space-y-4 text-sm">
                            <div class="flex gap-3 items-start">
                                <i data-lucide="phone" class="h-4 w-4 text-primary mt-0.5 shrink-0"></i>
                                <div>
                                    <p class="font-semibold">Téléphone</p>
                                    <a href="tel:+2290197004726" class="text-muted-foreground hover:text-primary">+229 0197004726</a>
                                </div>
                            </div>
                            <div class="flex gap-3 items-start">
                                <i data-lucide="mail" class="h-4 w-4 text-primary mt-0.5 shrink-0"></i>
                                <div>
                                    <p class="font-semibold">E-mail</p>
                                    <a href="mailto:contact@comclusives.com" class="text-muted-foreground hover:text-primary">contact@comclusives.com</a>
                                </div>
                            </div>
                            <div class="flex gap-3 items-start">
                                <i data-lucide="map-pin" class="h-4 w-4 text-primary mt-0.5 shrink-0"></i>
                                <div>
                                    <p class="font-semibold">Adresse</p>
                                    <p class="text-muted-foreground">Cotonou, Bénin</p>
                                </div>
                            </div>
                            <div class="flex gap-3 items-start">
                                <i data-lucide="clock" class="h-4 w-4 text-primary mt-0.5 shrink-0"></i>
                                <div>
                                    <p class="font-semibold">Horaires</p>
                                    <p class="text-muted-foreground">Lundi – Vendredi : 8h00 – 18h00</p>
                                </div>
                            </div>
                            <div class="flex gap-3 items-start">
                                <i data-lucide="message-circle" class="h-4 w-4 text-primary mt-0.5 shrink-0"></i>
                                <div>
                                    <p class="font-semibold">WhatsApp</p>
                                    <a href="https://whatsapp.com/channel/0029VbBrIFhA2pLHVsi5ul47" class="text-muted-foreground hover:text-primary">Notre chaîne →</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulaire -->
                    <form id="contactForm" class="lg:col-span-3 grid sm:grid-cols-2 gap-4" onsubmit="handleSubmit(event)">
                        @csrf
                        <div>
                            <label class="text-sm font-medium">Nom complet <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required class="mt-1 w-full px-4 py-3 rounded-xl border border-border bg-background focus:outline-none focus:ring-2 focus:ring-primary/30" placeholder="Votre nom" />
                        </div>
                        <div>
                            <label class="text-sm font-medium">E-mail <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required class="mt-1 w-full px-4 py-3 rounded-xl border border-border bg-background focus:outline-none focus:ring-2 focus:ring-primary/30" placeholder="votre@email.com" />
                        </div>
                        <div>
                            <label class="text-sm font-medium">Téléphone</label>
                            <input type="tel" name="phone" class="mt-1 w-full px-4 py-3 rounded-xl border border-border bg-background focus:outline-none focus:ring-2 focus:ring-primary/30" placeholder="+229..." />
                        </div>
                        <div>
                            <label class="text-sm font-medium">Objet</label>
                            <select name="subject" class="mt-1 w-full px-4 py-3 rounded-xl border border-border bg-background focus:outline-none focus:ring-2 focus:ring-primary/30">
                                <option>Renseignement</option>
                                <option>Rendez-vous</option>
                                <option>Partenariat</option>
                                <option>Autre</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-sm font-medium">Message <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="5" required class="mt-1 w-full px-4 py-3 rounded-xl border border-border bg-background focus:outline-none focus:ring-2 focus:ring-primary/30" placeholder="Votre message..."></textarea>
                        </div>
                        <div class="sm:col-span-2">
                            <button type="submit" id="contactBtn" class="btn-primary w-full">Envoyer le message</button>
                            <p id="successMsg" class="hidden mt-3 text-center text-sm text-primary font-medium">✓ Message envoyé ! Nous vous répondrons sous 48h.</p>
                            <p id="errorMsg" class="hidden mt-3 text-center text-sm text-red-500">Une erreur est survenue. Réessayez ou écrivez-nous directement.</p>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        {{-- Modal OTP vérification email contact --}}
        <div id="contactOtpModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/60" style="backdrop-filter:blur(4px)" onclick="closeContactOtp()"></div>
            <div class="relative bg-card rounded-[2rem] shadow-2xl w-full max-w-sm p-8 text-center z-10">
                <div class="h-14 w-14 rounded-2xl healing-gradient flex items-center justify-center mx-auto mb-5">
                    <i data-lucide="mail-check" class="h-7 w-7 text-white"></i>
                </div>
                <h3 class="font-bold text-xl mb-2">Vérifiez votre email</h3>
                <p class="text-muted-foreground text-sm mb-6">Un code à 6 chiffres a été envoyé à <strong id="otpEmailDisplay"></strong>. Entrez-le pour envoyer votre message.</p>
                <input id="contactOtpInput" type="text" inputmode="numeric" maxlength="6" placeholder="_ _ _ _ _ _"
                    class="w-full text-center text-3xl font-bold tracking-[0.5em] px-4 py-4 rounded-xl border-2 border-border focus:outline-none focus:border-primary mb-2"
                    style="font-family:'Courier New',monospace">
                <p id="contactOtpError" class="hidden text-red-500 text-sm mb-3">Code incorrect ou expiré.</p>
                <button onclick="verifyContactOtp()" id="contactOtpVerifyBtn" class="btn-primary w-full mb-3">Valider et envoyer</button>
                <button onclick="closeContactOtp()" class="w-full py-2 text-sm text-muted-foreground hover:text-foreground transition">Annuler</button>
                <p class="mt-4 text-xs text-muted-foreground">
                    Pas reçu ? <button onclick="resendContactOtp()" id="contactOtpResendBtn" class="text-primary underline">Renvoyer</button>
                </p>
            </div>
        </div>

        <!-- CARTE -->
        <section class="pb-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="rounded-[2rem] overflow-hidden shadow-soft" data-aos="fade-up">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126968.85782143456!2d2.3159699!3d6.3668606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1023552a6db46d25%3A0x3d2a5f0f68b5c0d9!2sCotonou%2C%20B%C3%A9nin!5e0!3m2!1sfr!2sfr!4v1700000000000"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </section>
    
@endsection

@push('scripts')
<script>
const CSRF = document.querySelector('meta[name="csrf-token"]').content;
let pendingFormData = null;

async function handleSubmit(e) {
    e.preventDefault();
    const form = document.getElementById('contactForm');
    const btn  = document.getElementById('contactBtn');
    const ok   = document.getElementById('successMsg');
    const err  = document.getElementById('errorMsg');
    ok.classList.add('hidden'); err.classList.add('hidden');

    const name  = form.querySelector('[name=name]').value.trim();
    const email = form.querySelector('[name=email]').value.trim();
    if (!name || !email) return;

    btn.disabled = true; btn.textContent = 'Envoi du code…';
    try {
        const res = await fetch('{{ route("contact.send-otp") }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
            body: JSON.stringify({ name, email })
        });
        if (res.ok) {
            pendingFormData = new FormData(form);
            document.getElementById('otpEmailDisplay').textContent = email;
            document.getElementById('contactOtpInput').value = '';
            document.getElementById('contactOtpError').classList.add('hidden');
            document.getElementById('contactOtpModal').classList.remove('hidden');
            document.getElementById('contactOtpModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
            document.getElementById('contactOtpInput').focus();
        } else {
            err.classList.remove('hidden');
        }
    } catch(ex) {
        err.classList.remove('hidden');
    }
    btn.disabled = false; btn.textContent = 'Envoyer le message';
}

function closeContactOtp() {
    document.getElementById('contactOtpModal').classList.add('hidden');
    document.getElementById('contactOtpModal').classList.remove('flex');
    document.body.style.overflow = '';
}

async function verifyContactOtp() {
    const otp = document.getElementById('contactOtpInput').value.trim();
    if (otp.length !== 6) return;
    const btn = document.getElementById('contactOtpVerifyBtn');
    const errEl = document.getElementById('contactOtpError');
    btn.disabled = true; btn.textContent = 'Vérification…';
    errEl.classList.add('hidden');
    try {
        pendingFormData.set('otp', otp);
        const res = await fetch('{{ route("contact.send") }}', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
            body: pendingFormData
        });
        if (res.ok) {
            closeContactOtp();
            document.getElementById('contactForm').reset();
            pendingFormData = null;
            document.getElementById('successMsg').classList.remove('hidden');
        } else {
            errEl.classList.remove('hidden');
        }
    } catch(ex) {
        errEl.classList.remove('hidden');
    }
    btn.disabled = false; btn.textContent = 'Valider et envoyer';
}

async function resendContactOtp() {
    if (!pendingFormData) return;
    const btn = document.getElementById('contactOtpResendBtn');
    btn.disabled = true; btn.textContent = 'Envoi…';
    const name  = pendingFormData.get('name');
    const email = pendingFormData.get('email');
    await fetch('{{ route("contact.send-otp") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
        body: JSON.stringify({ name, email })
    });
    btn.textContent = 'Code renvoyé';
    setTimeout(() => { btn.disabled = false; btn.textContent = 'Renvoyer'; }, 5000);
}

document.getElementById('contactOtpInput')?.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') verifyContactOtp();
});
</script>
@endpush
