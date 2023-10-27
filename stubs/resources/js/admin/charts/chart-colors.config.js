export function chartConfigs() {
    return {
        traffic: {
            border: "rgb(59, 130, 246)",
            gradient: [
                {
                    offset: 1,
                    color: "rgba(59, 130, 246, 0.2)",
                },
                {
                    offset: 0.2,
                    color: "rgba(59, 130, 246, 0.15)",
                },
                {
                    offset: 0,
                    color: "rgba(59, 130, 246, 0.0)",
                }
            ]
        },
        map: {
            color: "rgb(59, 130, 246)",
            hoverColor: "#9ca3af"
        }
    }
}
