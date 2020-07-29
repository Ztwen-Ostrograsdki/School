const teachers_states = {
    AllTeachersWithClasses : [], //With her classes formatted
    AllTeachersWithSubject : [], //With her subject formatted
    secondaryTeachers : {},
    targetTeacher : {},
    targetTeacherName: '',
    targetTeacherLastName: '',
    targetTeacherFirstName: '',
    targetTeacherClasseFMT: {},
    targetTeacherBirthFMT: '',
    age: '',

    newTeacher: {
        name: '',
        birth: '',
        sexe: '',
        subject: '',
        level: 'secondary',
        month: '',
        year: (new Date).getFullYear(),
    },

    editedTeacher : {},
    editedTeacherClasses : [],
    primaryTeachers : {},
    teachers: {},
    teachersAll: [], 
    teachersBlockedsAll: {},
    teachersBlockeds: {},
    TSBlockeds: [],
    TPBlockeds: [],
    alertTeachersSearch: 'Tous les enseignants'
}

export default teachers_states