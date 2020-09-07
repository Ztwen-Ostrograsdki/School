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
    editedTeacherIsAE: false,
    classesConcernedByATeacher : [],
    confirm_primary_classe: false,
    confirmTeacherClasses: false,
    refusedTeacherClasses: false,
    teacherHasNewClasse: undefined,
    classesRefused : [],
    editedTeacherClasses : [],
    cl1: '',
    cl2: '',
    cl3: '',
    cl4: '',
    cl5: '',
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