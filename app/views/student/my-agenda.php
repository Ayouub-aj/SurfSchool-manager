<?php require_once BASEURL . '/views/shared/header.php'; ?>

<div class="container py-5">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-6">
            <div class="card auth-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h4 class="fw-bold text-ocean mb-0">🏄 Surfer Profile</h4>
                    <span class="badge bg-primary rounded-pill small fw-bold px-3 py-2">Level: <?php echo $data['student']['level']; ?></span>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold text-muted">Full Name</label>
                        <p class="fw-bold fs-5 mb-0"><?php echo $data['student']['full_name']; ?></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold text-muted">Country</label>
                        <p class="fw-bold fs-5 mb-0"><?php echo $data['student']['country']; ?></p>
                    </div>
                </div>
                <div class="d-grid mt-3">
                    <a href="<?php echo URLROOT; ?>/index.php?url=StudentController/profile" class="btn btn-outline-primary btn-sm fw-bold">Update Profile Information</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <hr class="my-5 opacity-25">
            <h4 class="fw-bold text-ocean mb-4 text-center">📅 My Surf Agenda</h4>
            <div class="row g-4">
                <?php if (empty($data['lessons'])): ?>
                    <div class="col-12">
                        <div class="card auth-card p-5 text-center">
                            <h5 class="text-muted italic mb-0">No sessions booked yet. Contact manager to register.</h5>
                        </div>
                    </div>
                <?php else: foreach ($data['lessons'] as $lesson): ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="card border-0 shadow-sm rounded-4 p-3 h-100 bg-white border-start border-primary border-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold mb-0"><?php echo $lesson['title']; ?></h6>
                                <span class="badge <?php echo $lesson['payment_status'] === 'Paid' ? 'bg-success' : 'bg-warning text-dark'; ?> rounded-pill small">
                                    <?php echo $lesson['payment_status']; ?>
                                </span>
                            </div>
                            <p class="text-muted small mb-0"><i class="bi bi-person"></i> Coach: <?php echo $lesson['coach_name']; ?></p>
                            <div class="mt-auto pt-3 border-top">
                                <span class="small fw-bold text-ocean"><?php echo date('M d, Y', strtotime($lesson['lesson_date'])); ?> @ <?php echo date('H:i', strtotime($lesson['lesson_date'])); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once BASEURL . '/views/shared/footer.php'; ?>
