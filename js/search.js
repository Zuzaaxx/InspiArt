const search = document.querySelector('input[placeholder="search idea"]');
const projectContainer = document.querySelector(".section");
search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        const data = {search: this.value};
        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (projects) {
            projectContainer.innerHTML = "";
            loadProjects(projects);
        });
    }
});

function loadProjects(projects) {
    projects.forEach(project => {
        console.log(project);
        createProject(project);
    });
}

function createProject(project) {
    const template = document.querySelector("#idea-template");
    const clone = template.content.cloneNode(true);
    const div = clone.querySelector(".idea");
    div.id = `${project.user_id}-${project.idea_id}`;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${project.path}`;
    const title = clone.querySelector("h3");
    title.innerHTML = project.title;
    const description = clone.querySelector("p");
    description.innerHTML = project.description;

    projectContainer.appendChild(clone);
}
