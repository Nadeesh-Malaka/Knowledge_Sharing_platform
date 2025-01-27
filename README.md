# 🌟 Q&A and Chat for Knowledge Sharing Platform

A collaborative web-based platform developed to connect individuals for knowledge exchange, guidance, and learning through discussion forums, Q&A sessions, and real-time chatting.

---

## 📚 Table of Contents
1. [Overview](#overview)
2. [Features](#features)
3. [Tech Stack](#tech-stack)
4. [Installation Guide](#installation-guide)
5. [Admin Credentials](#admin-credentials)
6. [UI Features](#ui-features)
7. [Testing Methodologies](#testing-methodologies)
8. [Future Enhancements](#future-enhancements)
9. [Contributors](#contributors)
10. [License](#license)
11. [Contact](#contact)

---

## 🚀 Overview
In Sri Lanka, there is a growing need for a platform to bridge the gap between academic education and practical knowledge. Our **Q&A and Chat for Knowledge Sharing Platform** provides users with:
- **Discussion forums** for detailed topic-based conversations.
- **Q&A sessions** for focused knowledge sharing.
- **Real-time chat** for seamless communication.

This platform is tailored for students, educators, and professionals, enabling them to acquire knowledge and exchange expertise effectively.

---

## 🌟 Features
### 🧑‍🎓 User Features
- **Registration & Authentication**
  - Secure account creation and password recovery.
  - Role-based access (Admin, Regular User, Guest).
- **Q&A Functionality**
  - Post questions, provide answers, and search by topics.
  - Categorized search and filtering for easy navigation.
- **Real-Time Chat**
  - One-on-one messaging and group chats.
  - Secure communication channels for effective collaboration.
- **User Profiles**
  - Personalized profiles with activity tracking.
  - Insights into user participation and expertise.
- **Resource Library**
  - Access to curated study materials, guides, and resources.

### 🛠️ Admin Features
- **Moderation Tools**
  - Approve, edit, or delete posts, comments, and content.
  - Enforce platform guidelines and monitor activity.
- **Content Management**
  - Add or update Q&A threads, user accounts, and chats.
- **Analytics Dashboard**
  - Visualize trends in user activity and content engagement.

---

## 🛠️ Tech Stack
| **Component**   | **Technology Used**              |
|-----------------|----------------------------------|
| **Frontend**    | HTML, CSS, JavaScript           |
| **Backend**     | Laravel (PHP)                   |
| **Database**    | MySQL                           |
| **Tools**       | Composer, Git                   |

---

## ⚙️ Installation Guide
Follow these steps to set up and run the project locally.

### Prerequisites
- Install [Composer](https://getcomposer.org/) and [MySQL](https://www.mysql.com/).

### Step 1: Clone the Repository
```bash
git clone https://github.com/Nadeesh-Malaka/Knowledge_Sharing_platform.git
cd Q-A_and_Chat_for_Knowledge_Sharing-platform
```

### Step 2: Backend Setup (Laravel)

1. Install dependencies:
   ```bash
   composer install
   ```

2. Create and configure the `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=knowledge_sharing
   DB_USERNAME=root
   DB_PASSWORD=yourpassword
   ```

3. Run database migrations:
   ```bash
   php artisan migrate
   ```

4. Start the Laravel development server:
   ```bash
   php artisan serve
   ```

---

## 🔑 Admin Credentials
- **Email:** admin@gmail.com  
- **Password:** 12345678  

---

## 🎨 UI Features
- **Responsive Design:** Optimized for mobile, tablet, and desktop devices.
- **Dark Mode:** Optional dark mode for a sleek user experience.
- **User-Friendly Navigation:** Simplified and modern layout for all user roles.

---

## 🧪 Testing Methodologies
We employed various testing methods to ensure system reliability:
- **Unit Testing:** Validate individual components and modules.
- **Integration Testing:** Ensure smooth interaction between components.
- **System Testing:** Evaluate the system as a whole.
- **User Acceptance Testing:** Verify functionality aligns with user needs.
- **Performance Testing:** Assess responsiveness under different load conditions.
- **Security Testing:** Identify and mitigate vulnerabilities.
- **Regression Testing:** Ensure updates don’t disrupt existing features.

---

## 📊 Future Enhancements
- **AI-Powered Insights**
  - Automated topic suggestions.
  - AI-curated learning paths based on user activity.
- **Mobile App**
  - Develop a Flutter-based mobile app for on-the-go access.
  - Push notifications for instant updates.
- **Gamification**
  - Leaderboards, badges, and rewards for active contributors.
- **Collaboration Tools**
  - Group discussions, shared projects, and peer reviews.
- **Integration**
  - Sync with LMS platforms for seamless academic resource sharing.

---

## 🌟 Contributors
**Team Members:**
- Nadeesh Malaka -
- Udara Dilshan
- Sasini Devaraja
- Hiruni Sandupama
- Harsha Madushan

**Supervisor:**
- Mrs. Thilini Bakmeedeniya - Email

---

## 📝 License
This project is licensed under the MIT License.

---

## 📞 Contact
For further queries or support, reach out to **Nadeesh Malaka**.
