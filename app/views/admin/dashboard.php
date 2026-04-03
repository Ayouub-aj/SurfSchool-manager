<?php require_once BASEURL . '/views/shared/header.php'; ?>

<div class="container py-4">
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card auth-card text-center p-3">
                <h5 class="text-muted small fw-bold text-uppercase mb-2">Total Students</h5>
                <h2 class="text-ocean fw-bold mb-0"><?php echo count($data['students']); ?></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card auth-card text-center p-3">
                <h5 class="text-muted small fw-bold text-uppercase mb-2">Avg. Occupancy</h5>
                <h2 class="text-ocean fw-bold mb-0"><?php echo $data['avg_occupancy']; ?> <small class="fs-6">surfers/session</small></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card auth-card text-center p-3">
                <h5 class="text-muted small fw-bold text-uppercase mb-2">Scheduled Lessons</h5>
                <h2 class="text-ocean fw-bold mb-0"><?php echo count($data['lessons']); ?></h2>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-12">
            <div class="card auth-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold text-ocean mb-0">🌊 Student Directory</h4>
                    <a href="<?php echo URLROOT; ?>/index.php?url=AdminController/manageLessons" class="btn btn-primary btn-sm px-3 fw-bold">Manage Lessons</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="small fw-bold">ID</th>
                                <th class="small fw-bold">Full Name</th>
                                <th class="small fw-bold">Email</th>
                                <th class="small fw-bold">Country</th>
                                <th class="small fw-bold text-center">Level</th>
                                <th class="small fw-bold text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['students'] as $student): ?>
                            <tr>
                                <td class="small text-muted">#<?php echo $student['id']; ?></td>
                                <td class="fw-bold"><?php echo $student['full_name']; ?></td>
                                <td class="small"><?php echo $student['email']; ?></td>
                                <td class="small"><?php echo $student['country']; ?></td>
                                <td class="text-center">
                                    <form action="<?php echo URLROOT; ?>/index.php?url=AdminController/updateLevel" method="POST" class="d-inline-flex align-items-center">
                                        <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
                                        <select name="level" class="form-select form-select-sm border-0 bg-light fw-bold" onchange="this.form.submit()">
                                            <option value="Beginner" <?php echo $student['level'] === 'Beginner' ? 'selected' : ''; ?>>Beginner</option>
                                            <option value="Intermediate" <?php echo $student['level'] === 'Intermediate' ? 'selected' : ''; ?>>Intermediate</option>
                                            <option value="Advanced" <?php echo $student['level'] === 'Advanced' ? 'selected' : ''; ?>>Advanced</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="text-end">
                                    <a href="<?php echo URLROOT; ?>/index.php?url=AdminController/deleteStudent&id=<?php echo $student['id']; ?>" class="btn btn-sm btn-outline-danger px-3 fw-bold border-0" onclick="return confirm('Archive this student account?')">Archive</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mt-5">
            <div class="card auth-card p-4">
                <h4 class="fw-bold text-ocean mb-4">📅 Active Sessions & Registrations</h4>
                <div class="row g-4">
                    <?php foreach ($data['lessons'] as $lesson): ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="card border-0 shadow-sm rounded-4 p-3 h-100 bg-white border-start border-primary border-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6 class="fw-bold mb-0"><?php echo $lesson['title']; ?></h6>
                                <span class="badge <?php echo $lesson['student_count'] >= $lesson['max_capacity'] ? 'bg-danger' : 'bg-primary'; ?> rounded-pill small">
                                    <?php echo $lesson['student_count']; ?>/<?php echo $lesson['max_capacity']; ?>
                                </span>
                            </div>
                            <p class="text-muted small mb-3"><i class="bi bi-person"></i> Coach: <?php echo $lesson['coach_name']; ?></p>
                            <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                <span class="small fw-bold text-ocean"><?php echo date('M d, H:i', strtotime($lesson['lesson_date'])); ?></span>
                                <button class="btn btn-sm btn-link text-decoration-none fw-bold p-0 text-ocean" type="button" data-bs-toggle="collapse" data-bs-target="#lesson-<?php echo $lesson['id']; ?>">Toggle Roster</button>
                            </div>
                            
                            <div class="collapse mt-3" id="lesson-<?php echo $lesson['id']; ?>">
                                <form action="<?php echo URLROOT; ?>/index.php?url=AdminController/assignStudent" method="POST" class="input-group input-group-sm mb-3">
                                    <input type="hidden" name="lesson_id" value="<?php echo $lesson['id']; ?>">
                                    <select name="student_id" class="form-select border-0 bg-light fw-bold" required>
                                        <option value="" disabled selected>Add surfer...</option>
                                        <?php foreach ($data['students'] as $s): ?>
                                            <option value="<?php echo $s['id']; ?>"><?php echo $s['full_name']; ?> (<?php echo $s['level']; ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button class="btn btn-ocean fw-bold" type="submit">Add</button>
                                </form>
                                <hr class="my-2 opacity-10">
                                <p class="small fw-bold text-muted mb-2">Surfer Roster:</p>
                                <ul class="list-unstyled mb-0">
                                    <?php 
                                    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                                    $stmt = $db->prepare("SELECT s.*, lr.payment_status FROM students s JOIN lesson_registrations lr ON s.id = lr.student_id WHERE lr.lesson_id = ?");
                                    $stmt->execute([$lesson['id']]);
                                    $registered = $stmt->fetchAll();
                                    if (empty($registered)): ?>
                                        <li class="small text-muted italic">No surfers registered.</li>
                                    <?php else:
                                        foreach ($registered as $reg): ?>
                                        <li class="d-flex justify-content-between align-items-center mb-2 small border-bottom pb-1">
                                            <span><?php echo $reg['full_name']; ?></span>
                                            <a href="<?php echo URLROOT; ?>/index.php?url=AdminController/togglePayment&lesson_id=<?php echo $lesson['id']; ?>&student_id=<?php echo $reg['id']; ?>&status=<?php echo $reg['payment_status'] === 'Paid' ? 'Pending' : 'Paid'; ?>" class="badge border-0 <?php echo $reg['payment_status'] === 'Paid' ? 'bg-success' : 'bg-warning text-dark'; ?> text-decoration-none">
                                                <?php echo $reg['payment_status']; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once BASEURL . '/views/shared/footer.php'; ?>
