<?php require_once BASEURL . '/views/shared/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-card p-4">
                <h3 class="fw-bold text-ocean mb-4">Create New Surf Session</h3>
                <form action="<?php echo URLROOT; ?>/index.php?url=AdminController/manageLessons" method="POST">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Lesson Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Session Name" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Coach Name</label>
                            <input type="text" name="coach_name" class="form-control" placeholder="Instructor Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Max Capacity</label>
                            <input type="number" name="max_capacity" class="form-control" value="10" min="1" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold">Session Date & Time</label>
                        <input type="datetime-local" name="lesson_date" class="form-control" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary fw-bold py-2">Schedule Session</button>
                        <a href="<?php echo URLROOT; ?>/index.php?url=AdminController/dashboard" class="btn btn-link text-muted small text-decoration-none">Back to Dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once BASEURL . '/views/shared/footer.php'; ?>
