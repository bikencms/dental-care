<!-- SECTION: CLINIC ACCOUNT INFORMATION (READ-ONLY WITH COPY & PASSWORD VIEW) -->
<div class="card border-0 shadow-sm rounded-3 p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <div>
            <h5 class="fw-bold text-dark mb-1">
                <i class="fas fa-user-shield text-primary me-2"></i>Account Information
            </h5>
            <p class="text-muted small mb-0">Account credentials and contact details for {{ $clinic->name }}</p>
        </div>
        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill small">
            <i class="fas fa-check-circle me-1"></i> Active Account
        </span>
    </div>

    <div class="row g-4">
        <!-- 1. Email -->
        <div class="col-md-4">
            <div class="p-3 border rounded-3 bg-light h-100">
                <span class="text-muted small fw-semibold text-uppercase d-block mb-1">Email Address</span>
                <div class="d-flex align-items-center justify-content-between">
                    <span id="account-email-text" class="fw-bold text-dark text-break">{{ $clinic->user?->email ?? $clinic->email ?? 'N/A' }}</span>
                    
                    <button type="button" class="btn btn-sm btn-link text-secondary btn-copy p-0 ms-2" data-target="account-email-text" title="Copy Email">
                        <!-- Copy Icon -->
                        <svg class="icon icon-xs icon-copy" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path>
                            <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z"></path>
                        </svg>
                        <!-- Check Icon (Hidden) -->
                        <svg class="icon icon-xs text-success icon-check d-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- 2. Phone -->
        <div class="col-md-4">
            <div class="p-3 border rounded-3 bg-light h-100">
                <span class="text-muted small fw-semibold text-uppercase d-block mb-1">Phone Number</span>
                <div class="d-flex align-items-center justify-content-between">
                    <span id="account-phone-text" class="fw-bold text-dark">{{ $clinic->user?->phone ?? $clinic->phone ?? 'N/A' }}</span>
                    
                    <button type="button" class="btn btn-sm btn-link text-secondary btn-copy p-0 ms-2" data-target="account-phone-text" title="Copy Phone">
                        <!-- Copy Icon -->
                        <svg class="icon icon-xs icon-copy" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path>
                            <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z"></path>
                        </svg>
                        <!-- Check Icon (Hidden) -->
                        <svg class="icon icon-xs text-success icon-check d-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- 3. Password -->
        <div class="col-md-4">
            <div class="p-3 border rounded-3 bg-light h-100">
                <span class="text-muted small fw-semibold text-uppercase d-block mb-1">Password</span>
                <div class="d-flex align-items-center justify-content-between">
                    <span id="account-password-text" class="fw-bold text-dark font-monospace">••••••••</span>
                    
                    <div class="d-flex align-items-center gap-2">
                        <!-- Button Copy Password -->
                        <button type="button" class="btn btn-sm btn-link text-secondary btn-copy p-0" data-type="password" title="Copy Password">
                            <svg class="icon icon-xs icon-copy" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path>
                                <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z"></path>
                            </svg>
                            <svg class="icon icon-xs text-success icon-check d-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- Button Toggle View Password -->
                        <button type="button" id="btn-toggle-view-password" class="btn btn-sm btn-link text-primary p-0" title="Show/Hide Password">
                            <!-- Eye Icon -->
                            <svg id="icon-eye-open" class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                            <!-- Eye Slash Icon -->
                            <svg id="icon-eye-close" class="icon icon-xs d-none" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"></path>
                                <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 1.011 0 1.991-.146 2.913-.418z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const rawPassword = "{{ $clinic->user?->plain_password ?? $clinic->password_raw ?? 'Secret@123' }}";
    const pwTextEl = document.getElementById('account-password-text');
    const btnToggle = document.getElementById('btn-toggle-view-password');
    const iconOpen = document.getElementById('icon-eye-open');
    const iconClose = document.getElementById('icon-eye-close');

    // Toggle Password Visibility
    if (btnToggle) {
        btnToggle.addEventListener('click', function () {
            if (pwTextEl.innerText === '••••••••') {
                pwTextEl.innerText = rawPassword;
                iconOpen.classList.add('d-none');
                iconClose.classList.remove('d-none');
            } else {
                pwTextEl.innerText = '••••••••';
                iconOpen.classList.remove('d-none');
                iconClose.classList.add('d-none');
            }
        });
    }

    // Copy functionality
    document.querySelectorAll('.btn-copy').forEach(btn => {
        btn.addEventListener('click', function () {
            let textToCopy = '';
            
            if (this.getAttribute('data-type') === 'password') {
                textToCopy = rawPassword;
            } else {
                const targetId = this.getAttribute('data-target');
                const targetEl = document.getElementById(targetId);
                textToCopy = targetEl ? targetEl.innerText.trim() : '';
            }

            if (textToCopy && textToCopy !== 'N/A') {
                navigator.clipboard.writeText(textToCopy).then(() => {
                    const iconCopy = this.querySelector('.icon-copy');
                    const iconCheck = this.querySelector('.icon-check');

                    if (iconCopy && iconCheck) {
                        iconCopy.classList.add('d-none');
                        iconCheck.classList.remove('d-none');

                        setTimeout(() => {
                            iconCopy.classList.remove('d-none');
                            iconCheck.classList.add('d-none');
                        }, 1500);
                    }
                });
            }
        });
    });
});
</script>