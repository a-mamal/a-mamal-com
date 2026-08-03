<section class="projects-section">
    <h2>Featured Projects</h2>

    <div class="card-grid">
        @forelse ($featuredProjects as $project)
            <article class="card project-preview-card">
                <h3 class="card-title">{{ $project->title }}</h3>

                <p class="card-text">{{ $project->description }}</p>
                @if ($project->github_url || $project->project_url)
                    <div class="card-actions">
                        @if ($project->github_url)
                            <a href="{{ $project->github_url }}"
                                class="button-fire"
                                target="_blank"
                                rel="noopener noreferrer">
                                GitHub
                            </a>
                        @endif

                        @if ($project->project_url)
                            <a href="{{ $project->project_url }}"
                                class="button-fire"
                                target="_blank"
                                rel="noopener noreferrer">
                                Live Demo
                            </a>
                        @endif
                    </div>
                @endif
            </article>
        @empty
            <p>No featured projects available yet.</p>
        @endforelse
    </div>

    <a href="{{ route('projects') }}" class="button-fire">
        View All Projects →
    </a>
</section>