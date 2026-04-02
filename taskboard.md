# SurfSchool Manager - Task Board

**Project:** Taghazout Surf Expo - Surf School Management System  
**Scrum Master:** Backend Developer  
**Sprint:** 5 Days (March 30 - April 3, 2026)  
**Team:** Individual

---

## Sprint Overview

| Sprint | Duration | Goal |
|--------|----------|------|
| Sprint 1 | Day 1 | Database design & MVC structure |
| Sprint 2 | Day 2 | Core Models & Authentication |
| Sprint 3 | Day 3 | Manager Dashboard & Lessons |
| Sprint 4 | Day 4 | Student Portal & Enrollments |
| Sprint 5 | Day 5 | Polish, Testing & Documentation |

---

## Product Backlog

### User Stories

| ID | Summary | Story Points | Priority |
|----|---------|--------------|----------|
| US1 | Manager login & dashboard | 3 | P0 - Critical |
| US2 | Create surf sessions & register students | 5 | P0 - Critical |
| US3 | Modify student levels | 2 | P0 - Critical |
| US4 | Student self-registration | 3 | P0 - Critical |
| US5 | Student calendar & payment status | 3 | P0 - Critical |
| BF1 | MVC Router (index.php) | 2 | P1 - High |
| BF2 | Average occupancy stats | 1 | P2 - Medium |

---

## Sprint 1: Database & Structure (Day 1)

### Tasks

#### To Do
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T1.1 | Create database schema (4 tables) | Dev | US1-5 |
| T1.2 | Create seed data for testing | Dev | US1-5 |
| T1.3 | Set up MVC folder structure | Dev | BF1 |
| T1.4 | Create base Controller class | Dev | BF1 |
| T1.5 | Create base Model class | Dev | BF1 |
| T1.6 | Configure database connection | Dev | US1-5 |

#### Done
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T1.1 | Create database schema (4 tables) | Dev | US1-5 |
| T1.2 | Create seed data for testing | Dev | US1-5 |
| T1.3 | Set up MVC folder structure | Dev | BF1 |

---

## Sprint 2: Core Models & Auth (Day 2)

### Tasks

#### To Do
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T2.1 | Implement User model (CRUD) | Dev | US1, US4 |
| T2.2 | Implement Student model (CRUD) | Dev | US1, US4 |
| T2.3 | Implement Lesson model (CRUD) | Dev | US2 |
| T2.4 | Create AuthController | Dev | US1 |
| T2.5 | Implement login functionality | Dev | US1 |
| T2.6 | Add password hashing (BCRYPT) | Dev | US1 |

#### In Progress
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T2.1 | Implement User model (CRUD) | Dev | US1, US4 |
| T2.2 | Implement Student model (CRUD) | Dev | US1, US4 |

#### Done
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T1.4 | Create base Controller class | Dev | BF1 |
| T1.5 | Create base Model class | Dev | BF1 |
| T1.6 | Configure database connection | Dev | US1-5 |

---

## Sprint 3: Manager Dashboard (Day 3)

### Tasks

#### To Do
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T3.1 | Create AdminController | Dev | US1 |
| T3.2 | Build manager dashboard view | Dev | US1 |
| T3.3 | List all students with levels | Dev | US1 |
| T3.4 | List all planned lessons | Dev | US1 |
| T3.5 | Create lesson form | Dev | US2 |
| T3.6 | Implement lesson creation | Dev | US2 |
| T3.7 | Register students to lessons | Dev | US2 |
| T3.8 | Update student level form | Dev | US3 |
| T3.9 | Implement level modification | Dev | US3 |

#### Done
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T2.1 | Implement User model (CRUD) | Dev | US1, US4 |
| T2.2 | Implement Student model (CRUD) | Dev | US1, US4 |
| T2.3 | Implement Lesson model (CRUD) | Dev | US2 |
| T2.4 | Create AuthController | Dev | US1 |
| T2.5 | Implement login functionality | Dev | US1 |
| T2.6 | Add password hashing (BCRYPT) | Dev | US1 |

---

## Sprint 4: Student Portal (Day 4)

### Tasks

#### To Do
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T4.1 | Create StudentController | Dev | US4 |
| T4.2 | Build registration form | Dev | US4 |
| T4.3 | Implement profile creation | Dev | US4 |
| T4.4 | Create my-agenda view | Dev | US5 |
| T4.5 | List student's lessons | Dev | US5 |
| T4.6 | Display payment status | Dev | US5 |
| T4.7 | Implement enrollment logic | Dev | US2, US5 |

#### Done
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T3.1 | Create AdminController | Dev | US1 |
| T3.2 | Build manager dashboard view | Dev | US1 |
| T3.3 | List all students with levels | Dev | US1 |
| T3.4 | List all planned lessons | Dev | US1 |
| T3.5 | Create lesson form | Dev | US2 |
| T3.6 | Implement lesson creation | Dev | US2 |
| T3.7 | Register students to lessons | Dev | US2 |
| T3.8 | Update student level form | Dev | US3 |
| T3.9 | Implement level modification | Dev | US3 |

---

## Sprint 5: Polish & Release (Day 5)

### Tasks

#### To Do
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T5.1 | Implement MVC router | Dev | BF1 |
| T5.2 | Add occupancy statistics | Dev | BF2 |
| T5.3 | Form validation enhancement | Dev | US1-5 |
| T5.4 | Error handling & edge cases | Dev | US1-5 |
| T5.5 | Code review preparation | Dev | All |
| T5.6 | Final testing & bug fixes | Dev | All |
| T5.7 | Update README documentation | Dev | Doc |
| T5.8 | Create taskboard documentation | Dev | Doc |

#### In Progress
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T5.1 | Implement MVC router | Dev | BF1 |

#### Done
| ID | Task | Assignee | Story |
|----|------|----------|-------|
| T4.1 | Create StudentController | Dev | US4 |
| T4.2 | Build registration form | Dev | US4 |
| T4.3 | Implement profile creation | Dev | US4 |
| T4.4 | Create my-agenda view | Dev | US5 |
| T4.5 | List student's lessons | Dev | US5 |
| T4.6 | Display payment status | Dev | US5 |
| T4.7 | Implement enrollment logic | Dev | US2, US5 |

---

## Jira Board View

### Backlog

```
📋 BACKLOG
├── [US1] Manager login & dashboard
├── [US2] Create surf sessions & register students
├── [US3] Modify student levels
├── [US4] Student self-registration
├── [US5] Student calendar & payment status
├── [BF1] MVC Router
└── [BF2] Average occupancy stats
```

### Sprint 1 Board

| To Do | In Progress | Done |
|-------|-------------|------|
| ⬜ T1.1 Schema | | ✅ T1.1 Schema |
| ⬜ T1.2 Seed | | ✅ T1.2 Seed |
| ⬜ T1.3 Structure | | ✅ T1.3 Structure |
| ⬜ T1.4 Controller | | |
| ⬜ T1.5 Model | | |
| ⬜ T1.6 DB Config | | |

### Sprint 2 Board

| To Do | In Progress | Done |
|-------|-------------|------|
| ⬜ T2.1 User Model | 🔄 T2.1 User Model | ✅ T1.4 Controller |
| ⬜ T2.2 Student Model | 🔄 T2.2 Student Model | ✅ T1.5 Model |
| ⬜ T2.3 Lesson Model | | ✅ T1.6 DB Config |
| ⬜ T2.4 AuthController | | |
| ⬜ T2.5 Login | | |
| ⬜ T2.6 Password Hash | | |

### Sprint 3 Board

| To Do | In Progress | Done |
|-------|-------------|------|
| ⬜ T3.1 AdminController | | ✅ T2.1 User Model |
| ⬜ T3.2 Dashboard View | | ✅ T2.2 Student Model |
| ⬜ T3.3 List Students | | ✅ T2.3 Lesson Model |
| ⬜ T3.4 List Lessons | | ✅ T2.4 AuthController |
| ⬜ T3.5 Create Form | | ✅ T2.5 Login |
| ⬜ T3.6 Create Lesson | | ✅ T2.6 Password Hash |
| ⬜ T3.7 Register Student | | |
| ⬜ T3.8 Level Form | | |
| ⬜ T3.9 Modify Level | | |

### Sprint 4 Board

| To Do | In Progress | Done |
|-------|-------------|------|
| ⬜ T4.1 StudentController | | ✅ T3.1 AdminController |
| ⬜ T4.2 Registration Form | | ✅ T3.2 Dashboard View |
| ⬜ T4.3 Profile Creation | | ✅ T3.3 List Students |
| ⬜ T4.4 My Agenda View | | ✅ T3.4 List Lessons |
| ⬜ T4.5 List Lessons | | ✅ T3.5 Create Form |
| ⬜ T4.6 Payment Status | | ✅ T3.6 Create Lesson |
| ⬜ T4.7 Enrollment | | ✅ T3.7 Register Student |
| | | ✅ T3.8 Level Form |
| | | ✅ T3.9 Modify Level |

### Sprint 5 Board

| To Do | In Progress | Done |
|-------|-------------|------|
| ⬜ T5.2 Stats | 🔄 T5.1 Router | ✅ T4.1 StudentController |
| ⬜ T5.3 Validation | | ✅ T4.2 Registration Form |
| ⬜ T5.4 Error Handling | | ✅ T4.3 Profile Creation |
| ⬜ T5.5 Code Review | | ✅ T4.4 My Agenda View |
| ⬜ T5.6 Testing | | ✅ T4.5 List Lessons |
| ⬜ T5.7 README | | ✅ T4.6 Payment Status |
| ⬜ T5.8 Taskboard | | ✅ T4.7 Enrollment |

---

## Burndown Chart

| Day | Tasks Remaining | Ideal |
|-----|-----------------|-------|
| 1 | 12 | 34 |
| 2 | 18 | 27 |
| 3 | 9 | 20 |
| 4 | 7 | 13 |
| 5 | 0 | 6 |

---

## Definition of Done

- [ ] Code compiles without errors
- [ ] All unit tests pass
- [ ] Code review completed
- [ ] Documentation updated
- [ ] All user stories demonstrated
- [ ] No SQL queries in view files
- [ ] Proper encapsulation verified

---

## Daily Standups

### Day 1 - Monday 03/30/2026
**Status:** Completed  
**Blockers:** None  
**Next:** Implement base classes

### Day 2 - Tuesday 03/31/2026
**Status:** Completed  
**Blockers:** None  
**Next:** Manager dashboard

### Day 3 - Wednesday 04/01/2026
**Status:** Completed  
**Blockers:** None  
**Next:** Student portal

### Day 4 - Thursday 04/02/2026
**Status:** Completed  
**Blockers:** None  
**Next:** Final polish

### Day 5 - Friday 04/03/2026
**Status:** In Progress  
**Blockers:** None  
**Next:** Demo & code review

---

## Notes

- Individual project - no team dependencies
- Manual testing via browser
- Use seed data for verification
- Follow PixelCraft Agency guidelines (no AI for business logic)

---

*Last Updated: April 2, 2026*
